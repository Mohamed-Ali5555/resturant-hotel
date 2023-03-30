<div class="row">



    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Name"],
        ['model_key' => 'daily', 'model' => isset($row) ? $row : null, 'model_name' =>"Daily"],
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






</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
