<div class="row">
    <div class="col-md-6 form-group">
<label class="col-form-label">Album</label>
        <select class="form-control select" data-live-search="true" data-max-options="6" id="type_id"  name="type_id" >
            <option value="">Select Album</option>
            @foreach($append['types'] as $option)
                <option {{isset($row)&&$row['type_id']==$option['id']?'selected':""}}  value="{{$option['id']}}"> {{$option['name']}}</option>
            @endforeach

        </select>
        <input type="hidden" id="id" value="" name="option_id[]">
    </div>
    <?php
    $fields = [
        ['model_key' => 'title', 'model' => isset($row) ? $row : null, 'model_name' =>"Title"],
        ['model_key' => 'description',"type"=>"area", 'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>

    @include('include.input_lang',$fields )



        <div class="col-md-4">
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
        <button onclick="save_form($(this),event)"  type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
