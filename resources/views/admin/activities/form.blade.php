<div class="row">



    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Activity"],
      ['model_key' => 'description', "type"=>"area" ,'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>
    @include('include.input_lang',$fields )

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

</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
