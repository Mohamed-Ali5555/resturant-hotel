<div class="row">
    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Name"],


    ];
    ?>


    @include('include.input_lang',$fields )

    <div class="col-md-6">
        <label class="col-form-label">Icon</label>
        <select class="form-control selectpicker" name="icon" data-live-search="true" data-max-options="2" id="icon">


            @foreach(all_icon() as $icon)
            <option {{isset($row)&&$row['icon']=='fa-'.$icon?"selected":""}} data-content="<i class='fa fa-{{$icon}}'></i> {{$icon}}"  value="fa-{{$icon}}"> {{$icon}}</option>
                @endforeach
        </select>

    </div>

</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"  type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
