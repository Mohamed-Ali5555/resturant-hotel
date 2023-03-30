<div class="row">


    <div class="col-md-6 form-group">
        <label class="col-form-label">
            Type
        </label>
        <select class="form-control select " name="type_id" id="type_id">
            <option value=""> select Type</option>
          @foreach($append['types'] as $type)
<option value="{{$type['id']}}" {{isset($row)&&$row['types']==$type['id']?'selected':""}}>{{$type['name']}}</option>
            @endforeach

        </select>

    </div>
    <div class="col-md-6 form-group">
        <label class="col-form-label">
            Restaurant
        </label>
        <select class="form-control select " name="restaurant_id" id="restaurant_id">
            <option value=""> select Restaurant</option>
          @foreach($append['restaurants'] as $restaurant)
<option value="{{$restaurant['id']}}" {{isset($row)&&$row['restaurant_id']==$restaurant['id']?'selected':""}}>
    {{$restaurant['name']}}</option>
            @endforeach

        </select>

    </div>

    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Name"],
      ['model_key' => 'description', "type"=>"area" ,'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>
    @include('include.input_lang',$fields )
  <div class="col-md-6 form-group">
            <label class="col-form-label">Price</label>
            <input class="form-control" type="number" min="0" step="1" name="price" id="price"
                   value="{{$row['price']??0}}">

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






</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
