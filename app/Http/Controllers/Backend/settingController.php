<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\setings\setingcreate;

use App\Models\Setting;
use App\Models\SettingsTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class settingController extends backendController
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        all_lang();
        $route_pref = $this->route_pref();

        $where = $this->where();

        $array='';
        $row = $this->model->first();
        if($row) {
            $keywords = $row->keywords()->get()->pluck('tag')->toArray();

            $array = implode(',', $keywords);
        }




        return view('admin.' . $route_pref . '.index', compact('row', 'array','route_pref'));

    }



    public  function store(setingcreate $request){

        $array=$request->except(['default_image',"contact_image",'logo',"chek_home","album_image","privet_image","accommodation_image","Portfolio_image","pdf","factory_image",'tages',"story_image","request_image",'icon','admin_image',"home_image","background_image"]);

        if($request->hasFile('default_image')){
            $array['default_image']=$this->save_img($request['default_image'],'setting','default_image');
        }
        if($request->hasFile('contact_image')){
            $array['contact_image']=$this->save_img($request['contact_image'],'setting','contact_image');
        }
        if($request->hasFile('privet_image')){
            $array['privet_image']=$this->save_img($request['privet_image'],'setting','privet_image');
        }
        if($request->hasFile('chek_home')){
            $array['chek_home']=$this->save_img($request['chek_home'],'setting','chek_home');
        }
        if($request->hasFile('accommodation_image')){
            $array['accommodation_image']=$this->save_img($request['accommodation_image'],'setting','accommodation_image');
        }
        if($request->hasFile('album_image')){
            $array['album_image']=$this->save_img($request['album_image'],'setting','album_image');
        }
        if($request->hasFile('factory_image')){
            $array['factory_image']=$this->save_img($request['factory_image'],'setting','factory_image');

        }
        if($request->hasFile('Portfolio_image')){
            $array['Portfolio_image']=$this->save_img($request['Portfolio_image'],'setting','Portfolio_image');

        }
        if($request->hasFile('pdf')){
            $array['pdf']=$this->save_img($request['pdf'],'setting','pdf');

        }
        if($request->hasFile('logo')){
            $array['logo']=$this->save_img($request['logo'],'setting','logo');

        }
        if($request->hasFile('admin_image')){
            $array['admin_image']=$this->save_img($request['admin_image'],'setting','admin_image');

        }
        if($request->hasFile('home_image')){
            $array['home_image']=$this->save_img($request['home_image'],'setting','home_image');

        }
        if($request->hasFile('icon')){
            $array['icon']=$this->save_img($request['icon'],'setting','icon');

        }
        if($request->hasFile('background_image')){
            $array['background_image']=$this->save_img($request['background_image'],'setting','background_image');

        }
        if($request->hasFile('request_image')){
            $array['request_image']=$this->save_img($request['request_image'],'setting','request_image');

        }
        if($request->hasFile('story_image')){
            $array['story_image']=$this->save_img($request['story_image'],'setting','story_image');

        }


        $row=$this->model::create($array);
        if(json_decode($request['tages'])!=null){
            foreach (json_decode($request['tages']) as $keywords) {
                SettingsTags::create(
                    [
                        'setting_id' => $row['id'],
                        'tag' => $keywords->value
                    ]
                );
            }
        }

        return back();
    }
    public function update(setingcreate $request,$id){
        $row=Setting::find($id);
        $array=$request->except(['default_image','logo',"contact_image","privet_image","chek_home","album_image","accommodation_image","Portfolio_image","pdf",'icon',"story_image","factory_image","request_image",'tages','admin_image',"background_image","home_image"]);
        if($request->hasFile('default_image')){
            $array['default_image']=$this->save_img($request['default_image'],'setting','default_image');
        }
        if($request->hasFile('contact_image')){
            $array['contact_image']=$this->save_img($request['contact_image'],'setting','contact_image');
        }
        if($request->hasFile('privet_image')){
            $array['privet_image']=$this->save_img($request['privet_image'],'setting','privet_image');
        }
        if($request->hasFile('accommodation_image')){
            $array['accommodation_image']=$this->save_img($request['accommodation_image'],'setting','accommodation_image');
        }
        if($request->hasFile('chek_home')){
            $array['chek_home']=$this->save_img($request['chek_home'],'setting','chek_home');
        }
        if($request->hasFile('album_image')){
            $array['album_image']=$this->save_img($request['album_image'],'setting','album_image');
        }
        if($request->hasFile('factory_image')){
            $array['factory_image']=$this->save_img($request['factory_image'],'setting','factory_image');

        }
        if($request->hasFile('pdf')){
            $array['pdf']=$this->save_img($request['pdf'],'setting','pdf');

        }
        if($request->hasFile('Portfolio_image')){
            $array['Portfolio_image']=$this->save_img($request['Portfolio_image'],'setting','Portfolio_image');

        }

        if($request->hasFile('home_image')){
            $array['home_image']=$this->save_img($request['home_image'],'setting','home_image');

        }
        if($request->hasFile('logo')){
            $array['logo']=$this->save_img($request['logo'],'setting','logo');

        }
        if($request->hasFile('icon')){
            $array['icon']=$this->save_img($request['icon'],'setting','icon');

        }
        if($request->hasFile('admin_image')){
            $array['admin_image']=$this->save_img($request['admin_image'],'setting','admin_image');

        }
        if($request->hasFile('request_image')){
            $array['request_image']=$this->save_img($request['request_image'],'setting','request_image');

        }
        if($request->hasFile('background_image')){
            $array['background_image']=$this->save_img($request['background_image'],'setting','background_image');
        }
        if($request->hasFile('story_image')){
            $array['story_image']=$this->save_img($request['story_image'],'setting','story_image');
        }

        $row->update($array);
        SettingsTags::where(['setting_id' => $row['id']])->delete();
        if(json_decode($request['tages'])!=null){
            foreach (json_decode($request['tages']) as $keywords) {
                SettingsTags::create(
                    [
                        'setting_id' => $row['id'],
                        'tag' => $keywords->value
                    ]
                );
            }
        }

        return back();

    }
}
