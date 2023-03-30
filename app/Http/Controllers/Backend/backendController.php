<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Models\notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Artisan;
use Str;
use Config;

class backendController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        Artisan::call('migrate');
        Artisan::call('cache:clear');
        Artisan::call('clear-compiled');
    }

    public function index()
    {
//        $this->setEnvironmentValue('DEFAULT_LANGUAGE','en');
        $route_pref = $this->route_pref();

        $where = $this->where();


        $rows = $this->model->orderBy('id','desc')->where($where)->get();
        $append = $this->append();
        $type_user='tester';

        return view('admin.' . $route_pref . '.index',
            compact('type_user','append','rows', 'route_pref'));
    }

    public function create()
    {


        $route_pref = $this->route_pref();
        $model_class = $this->getMiddlewaresingel();
        $append = $this->append();


        return view('admin.' . $route_pref. '.create', compact('route_pref', 'model_class','append'));
    }

    public function edit($id)
    {

        $model = $this->model;
        $append = $this->append();
        $route_pref = $this->route_pref();
        $model_class = $this->getMiddlewaresingel();
        $row = $model::findorfail(decrypt($id));



        return view('admin.' . $route_pref. '.edit', compact('row', 'append','route_pref', 'model_class'))->with($append);

    }

    public function destroy($id)
    {
        $model = $this->model;
        $row = $model::findorfail(decrypt($id));
        $row->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }

    public function getclassmodell()
    {
        return strtolower(Str::plural(class_basename($this->model)));
    }

    public function getMiddlewaresingel()
    {
        return strtolower(class_basename($this->model));
    }

    protected function append()
    {
        return [];
    }
    protected function route_pref()
    {
        return $this->getclassmodell();;
    }

    protected function with()
    {
        return [];
    }

    protected function where()
    {
        return [];
    }
    public function save_img($filles,$path,$name=null){
        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            'jfif'=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            "mp4"=>"video",
            "mpg"=>"video",
            "mpeg"=>"video",
            "webm"=>"video",
            "ogg"=>"video",
            "avi"=>"video",
            "mov"=>"video",
            "flv"=>"video",
            "swf"=>"video",
            "mkv"=>"video",
            "wmv"=>"video",
            "wma"=>"audio",
            "aac"=>"audio",
            "wav"=>"audio",
            "mp3"=>"audio",
            "zip"=>"archive",
            "rar"=>"archive",
            "7z"=>"archive",
            "doc"=>"document",
            "txt"=>"document",
            "docx"=>"document",
            "pdf"=>"document",
            "csv"=>"document",
            "xml"=>"document",
            "ods"=>"document",
            "xlr"=>"document",
            "xls"=>"document",
            "xlsx"=>"document"
        );

        $upload = new Upload;
        $ext=$filles->getClientOriginalExtension();
        if(isset($type[$filles->getClientOriginalExtension()]) &&$type[$filles->getClientOriginalExtension()]=='image'){
            $ext='webp';
        }
        if($name=='icon'){
            $ext='icon';
        }

        else{
            $upload->type = "others";
        }
if($name== null){
    $name=time() . Str::random(10);

}


        $file_name= $name . '.' . $ext;
        $upload['file_name'] = $path.'/'.$file_name;
        $upload['extension'] = $ext;

        $upload->file_size = $filles->getSize();

        $upload->file_original_name=$ext;
        $upload['user_id']=auth()->user()['id'];


        if($upload->save()){
            if (file_exists(public_path() . '/' . $file_name)) {
                unlink(public_path() . '/' . $file_name);
            }

            $filles->move(public_path($path), $file_name);
            return $upload['id'];
        }
    }
    public function remove_img($id){
        $ubload=Upload::where('id', $id)->first();

        if(isset($ubload)) {
            if (file_exists(public_path() . '/' . Upload::where('id', $id)->first()->file_name)) {
                unlink(public_path() . '/' . Upload::where('id', $id)->first()->file_name);
            }
            Upload::destroy($id);
        }
        return  true;

    }
    public function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();

        $str = file_get_contents($envFile);

        $oldValue =env($envKey,$envKey);



        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
    public function editor_upload(Request $request){

        $filles=$request['file'];
        $file_name= time() . Str::random(10) . '.webp' ;
        $filles->move(public_path('news/media'), $file_name);
        $url= asset('news/media/'.$file_name);
        return $url
            ;
    }
}
