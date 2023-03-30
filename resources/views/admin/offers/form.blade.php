<div class="row">


    <div class="col-md-6 form-group">
        <label class="col-form-label">
            Room
        </label>
        <select class="form-control select " name="room_id" id="room_id">
            <option value=""> select Room</option>
          @foreach($append['rooms'] as $room)
<option value="{{$room['id']}}" {{isset($row)&&$row['room_id']==$room['id']?'selected':""}}>
    {{$room['name']}}</option>
            @endforeach

        </select>

    </div>

    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Offer"],


    ];
    ?>
    @include('include.input_lang',$fields )
  <div class="col-md-6 form-group">
            <label class="col-form-label">Discount</label>
            <input class="form-control" type="number" min="0" step="1" name="price" id="price"
                   value="{{$row['price']??0}}">

        </div>
    <div class="col-md-6 form-group">
            <label class="col-form-label">Number Room</label>
            <input class="form-control" type="number" min="0" step="1" name="room_number" id="room_number"
                   value="{{$row['room_number']??0}}">

        </div>
    <div class="col-md-6 form-group">
            <label class="col-form-label">Number Night</label>
            <input class="form-control" type="number" min="0" step="1" name="night_number" id="night_number"
                   value="{{$row['night_number']??0}}">

        </div>
    <div class="col-md-6 form-group">
            <label class="col-form-label">Start Date</label>
            <input class="form-control" type="date"   name="start_date" id="start_date"
                   value="{{$row['start_date']??''}}">

        </div>
    <div class="col-md-6 form-group">
            <label class="col-form-label">End Date</label>
            <input class="form-control" type="date"   name="end_date" id="end_date"
                   value="{{$row['end_date']??''}}">

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
    <div class=" col-md-6">
        <div class="form-grom">
            <label class="col-form-label">Top </label>
            <br>
            <input type="hidden" name="top" value="0">
            <div class="switch">
                <input name="top" {{isset($row['top'])&&$row['top']==1?'checked':''}}

                value="1" id="top" type="checkbox" class="switch-input" />
                <label for="top" class="switch-label"></label>
            </div>


        </div>
    </div>






</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
