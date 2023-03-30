<?php

namespace App\Http\Controllers;

use App\Models\AboutFactoryImage;
use App\Models\Album;
use App\Models\CreativeImage;
use App\Models\Photo;
use App\Models\ProductImage;
use App\Models\ProjectImage;
use App\Models\Setting;
use App\Models\Upload;
use App\Models\UserFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileUploadController extends Controller {


    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view('upload-file.index');
    }

    public function uploadLargeFiles(Request $request) {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $type=$this->type_file($extension);

            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
$size=$file->getSize()/1024;


        $disk = Storage::disk(config('filesystems.default'));
        $path = $disk->putFileAs('/', $file, $fileName);






            // delete chunked file
            unlink($file->getPathname());


 $row=Upload::create([
    "file_name"=>"uploads/".$fileName,
     "type"=>$type,
     "file_original_name"=>str_replace('.'.$extension, '', $file->getClientOriginalName()),
]);



            return [
                'file' =>getfile($row['id']),
                "id"=>$row['id'],
"type"=>$type,
                "name"=>$row['file_original_name'],
                'ex'=>$extension,
                'size'=>$size
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
    function remove_image(Request $request){

        $this->remove_img($request['id']);
//        ProductImage::where(["image"=>$request['id']])->delete();
        Album::where(["image"=>$request['id']])->delete();
//        AboutFactoryImage::where(["image_id"=>$request['id']])->delete();
//        CreativeImage::where(["image_id"=>$request['id']])->delete();
        return back();

    }


    public function imageWatermark($path,$extination)
    {
        $img = Image::make(public_path($path));

        /* insert watermark at bottom-right corner with 10px offset */
        $img->insert(public_path($path), 'bottom-right', 10, 10);
        $img->encode($extination);

        $img->save(public_path($path));

        $type = $extination;
        $new_image = 'data:image/' . $type . ';base64,' . base64_encode($img);
return true;

    }

}
