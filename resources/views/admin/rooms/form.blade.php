<div class="row">

    <input type="hidden" name="lat" id="lat" value="{{$row['lat']??''}}">
    <input type="hidden" name="lang" id="lang" value="{{$row['lang']??''}}">
    <div class="col-md-6 form-group">
        <label class="col-form-label">
            Category
        </label>
        <select class="form-control select " name="category_id" id="category_id">
            <option value=""> select Category</option>
            @foreach($append['categories'] as $category)
                <option {{isset($row)&&$row['category_id']==$category['id']?"selected":""}} value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach

        </select>

    </div>
    <div class="col-md-6 form-group">
        <label class="col-form-label">
            Views
        </label>
        <select class="form-control select " name="view_id" id="view_id">
            <option value=""> select View</option>
            @foreach($append['views'] as $view)
                <option {{isset($row)&&$row['view_id']==$view['id']?"selected":""}}
                        value="{{$view['id']}}">{{$view['name']}}</option>
                @endforeach

        </select>

    </div>
    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Name"],
        ['model_key' => 'description', "type"=>"textarea" ,'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>
    @include('include.input_lang',$fields )
        <div class="col-md-6 form-group">
            <label class="col-form-label">Price</label>
            <input class="form-control" type="number" min="0" step="0" name="price" id="price" value="{{$row['price']??0}}">

        </div>
        <div class="col-md-6 form-group">
            <label class="col-form-label">Count</label>
            <input class="form-control" type="number" min="0" step="0" name="count" id="count" value="{{$row['count']??0}}">

        </div>
    <div class="col-md-6 form-group">
            <label class="col-form-label">Adult</label>
            <input class="form-control" type="number" min="0" step="0" name="adult" id="adult"
                   value="{{$row['adult']??0}}">

        </div>
        <div class="col-md-6 form-group">
            <label class="col-form-label">Size</label>
            <input class="form-control" type="number" min="0" step="0" name="size" id="size" value="{{$row['size']??0}}">

        </div>

    <div class=" col-md-6">
        <div class="form-grom">
            <label class="col-form-label">Active </label>
            <br>
            <input type="hidden" name="active" value="0">
            <div class="switch">
                <input name="active" {{isset($row['active'])&&$row['active']==1?'checked':''}}

                value="1" id="active" type="checkbox" class="switch-input" />
                <label for="active" class="switch-label"></label>
            </div>


        </div>
    </div>


        <div class="col-12 department">
            <h2> Option</h2>


            @if(isset($append['options_id'])&&count($append['options_id'])>0)
                @foreach($append['options_id'] as $key=>$option_id)


                    <div class="row form_debart mb-4 col-12 ">
                        <div class="  col-md-10 " >
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group">

                                        <select class="form-control select" data-live-search="true" data-max-options="6"  name="option[]" >
                                            <option value="">Select Option</option>
                                            @foreach($append['options'] as $option)
                                                <option {{$option['id']==$option_id['id']?"selected":''}}   value="{{$option['id']}}"> {{$option['name']}}</option>
                                            @endforeach

                                        </select>
                                        <input type="hidden" id="id" value="{{$option_id['pivot']['id']}}" name="option_id[]">
                                    </div>

                                    <div class="col-md-6 form-group">

                                        <input  class="form-control" value="{{$option_id['pivot']['short_value']}}" name="short_value[]"  placeholder="Short Value"  >

                                    </div>
                                    <div class="col-12 form-group">
                                        <input class="form-control" value="{{$option_id['pivot']['value']}}" name="value[]" placeholder="Value">
                                    </div>




                                </div>


                            </div>


                        </div>

                        <div class="col-md-2 remove_ro" style="" >
                            @if($key>0)

                                <button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button>
                            @else

                                <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                            @endif
                        </div>
                    </div>
                @endforeach


            @else
                <div class="row form_debart mb-4 col-12 ">
                    <div class="  col-md-10 " >
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 form-group">

                                    <select class="form-control select" data-live-search="true" data-max-options="6"  name="option[]" >
                                        <option value="">Select Option</option>
                                        @foreach($append['options'] as $option)
                                            <option   value="{{$option['id']}}"> {{$option['name']}}</option>
                                        @endforeach

                                    </select>
                                    <input type="hidden" id="id" value="" name="option_id[]">
                                </div>

                                <div class="col-md-6 form-group">

                                    <input  class="form-control" name="short_value[]"  placeholder="Short Value"  >

                                </div>
                                <div class="col-12 form-group">
                                    <input class="form-control" name="value[]" placeholder="Value">
                                </div>




                            </div>


                        </div>


                    </div>

                    <div class="col-md-2 remove_ro" style="" >

                        <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12 department">
<h2 >Prices</h2>

            @if(isset($append['prices'])&&count($append['prices'])>0)
                @foreach($append['prices'] as $key=>$price)


                    <div class="row form_debart mb-4 col-12 ">
                        <div class="  col-md-10 " >
                            <div class="col-md-12">
                                <div class="row">


                                    <div class="col-md-4 form-group">

                                        <input type="date" value="{{$price['start_date']??''}}"
                                               class="form-control" name="start_date[]"  placeholder="start Date "  >

                                    </div>
                                    <div class="col-md-4 form-group">

                                        <input type="date" value="{{$price['end_date']??''}}"
                                               class="form-control" name="end_date[]"  placeholder="End Date "  >

                                    </div>
                                    <div class="col-md-4 form-group">

                                        <input type="number" value="{{$price['price']??''}}"
                                               class="form-control" name="date_price[]"  placeholder="Price "  >

                                    </div>





                                </div>


                            </div>


                        </div>

                        <div class="col-md-2 remove_ro" style="" >
                            @if($key>0)

                                <button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button>
                            @else

                                <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                            @endif
                        </div>
                    </div>
                @endforeach


            @else
                <div class="row form_debart mb-4 col-12 ">
                    <div class="  col-md-10 " >
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-4 form-group">

                                    <input type="date"
                                           class="form-control" name="start_date[]"  placeholder="start Date "  >

                                </div>
                                <div class="col-md-4 form-group">

                                    <input type="date"
                                           class="form-control" name="end_date[]"  placeholder="End Date "  >

                                </div>
                                <div class="col-md-4 form-group">

                                    <input type="number"
                                           class="form-control" name="date_price[]"  placeholder="Price "  >

                                </div>




                            </div>


                        </div>


                    </div>

                    <div class="col-md-2 remove_ro" style="" >

                        <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                    </div>
                </div>
            @endif
        </div>
    <div class="col-12 department">
<h2 >Policy</h2>

            @if(isset($append['policies'])&&count($append['policies'])>0)
                @foreach($append['policies'] as $key=>$policy)


                    <div class="row form_debart mb-4 col-12 ">
                        <div class="  col-md-10 " >
                            <div class="col-md-12">
                                <div class="row">


                                    <div class="col-md-4 form-group">

                                        <input  value="{{$policy['title']??''}}"  class="form-control" name="policies[]"  placeholder="policies"  >

                                    </div>
                                    <div class="col-md-8 form-group">

                                        <input  value="{{$policy['description']??''}}"  class="form-control" name="policy_description[]"  placeholder="Description policies"  >

                                    </div>





                                </div>


                            </div>


                        </div>

                        <div class="col-md-2 remove_ro" style="" >
                            @if($key>0)

                                <button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button>
                            @else

                                <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                            @endif
                        </div>
                    </div>
                @endforeach


            @else
                <div class="row form_debart mb-4 col-12 ">
                    <div class="  col-md-10 " >
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-4 form-group">

                                    <input    class="form-control" name="policies[]"  placeholder="policies"  >

                                </div>
                                <div class="col-md-8 form-group">

                                    <input    class="form-control" name="policy_description[]"  placeholder="Description policies"  >

                                </div>





                            </div>


                        </div>


                    </div>

                    <div class="col-md-2 remove_ro" style="" >

                        <span onclick="add_debart($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group">

                <label for="projectinput1">  {{ucfirst('image')}}  </label>
                <div class="pernt_image">
                    <img class="show_image" width="100px" height="100px" src="{{isset($row['image'])?getfile($row['image']): getfile(0)}}">
                </div>
                <span id="image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                <input  class="input_upload " type="file"


                        class="form-control"

                        name="image">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">

                <label for="projectinput1">  {{ucfirst('plan')}}  </label>
                <div class="pernt_image">
                    <img class="show_image" id="image_plan" style="max-width: 100%" src="{{isset($row['plan'])?getfile($row['plan']): getfile(0)}}">
               <input type="hidden" name="x_image" id="x_image">
                    <input type="hidden" name="y_image" id="y_image">
                    <input type="hidden" name="w_image" id="w_image">
                    <input type="hidden" name="h_image" id="h_image">
                </div>
                <span id="plan" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
               <span class="btn btn-primary" onclick="add_debart_plan($(this),event)"> Add Plan</span>
                <input  class="input_upload " type="file"


                        class="form-control"

                        name="plan">

            </div>
        </div>
        <div class="col-12 department depart_plan {{count($append['plans'])==0?"d-none":''}}  ">
            <h2 >Room Plan</h2>

            @if(isset($append['plans'])&&count($append['plans'])>0)
                @foreach($append['plans'] as $key=>$plan)


                    <div class="row form_debart mb-4 col-12 ">
                        <div class="  col-md-10 " >
                            <div class="col-md-12">

                                <div class="row">


                                    <div class="col-md-12 form-group">

                                        <input   class="form-control plan_name" value="{{$plan['description']??''}}" name="plans[]"  placeholder="Description this Part"  >
                                        <input type="hidden" class="x_image_plan" value="{{$plan['x_image_plan']??''}}"  name="x_image_plan[]">
                                        <input type="hidden" class="y_image_plan" value="{{$plan['y_image_plan']??''}}"  name="y_image_plan[]">
                                        <input type="hidden" class="w_image_plan" value="{{$plan['w_image_plan']??''}}"  name="w_image_plan[]">
                                        <input type="hidden" class="h_image_plan" value="{{$plan['h_image_plan']??''}}"  name="h_image_plan[]">

                                    </div>





                                </div>

                            </div>


                        </div>

                        <div class="col-md-2 remove_ro" style="" >
                            @if($key>0)

                                <button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button>

  @endif
                        </div>
                    </div>
                @endforeach


            @else
                <div class="row form_debart mb-4 col-12 ">
                    <div class="  col-md-10 " >
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-12 form-group">

                                    <input   class="form-control plan_name" name="plans[]"  placeholder="Description this Part"  >
                                    <input type="hidden" class="x_image_plan"  name="x_image_plan[]">
                                    <input type="hidden" class="y_image_plan"  name="y_image_plan[]">
                                    <input type="hidden" class="w_image_plan"  name="w_image_plan[]">
                                    <input type="hidden" class="h_image_plan"  name="h_image_plan[]">

                                </div>





                            </div>


                        </div>


                    </div>

                    <div class="col-md-2 remove_ro" style="" >

{{--                        <span onclick="add_debart_plan($(this),event)"  id="add_debart" class="btn btn-success">أضافة  <i class="fa fa-plus"></i></span>--}}
                   </div>
                </div>
            @endif
        </div>


        <div class="col-12">
            <div class="pernt_image row" id="images_vue">
                @isset($row['images'])
                    @foreach($row['images'] as $image)
                        <div class="col-3 single_image_upload"  >
                            <input type="hidden" name="photos[]" value="{{$image['id']}}"  >
                            <span class="btn" onclick="remove_image($(this),'{{$image['id']}}')">
                                             -
                                            </span>


                                <img title="{{getfile_name($image['id'])}}" width="100px" src="{{getfile($image['id']??0)}}"  style="margin: 5px">


                        </div>
                    @endforeach
                @endif


            </div>

            <span id="images"  style="padding: 7px ;margin: 10px 0"
                  class="btn btn-primary btn-lg"><i class="fas fa-upload"></i> Add Images</span>
            <hr>
            <div class="progress mt-3" style="height: 0px ">
                <div class="progress-bar progress-bar-striped progress-bar-animated"
                     role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0</div>
            </div>

        </div>


        <div class="col-12 " id="all_map">
            <div class="row">
                <div class="form-group row form-md-line-input col-12">
                    <div class="col-md-12">
                        <input id="search2" style="margin-bottom: 4px;border: 1px solid #ff4e1c;color: #ff4e1c"  placeholder="{{ __('البحث عن موقع المشروع') }}" class="form-control">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
            </div>
            <div style="height: 400px" id="map"></div>
        </div>


</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
