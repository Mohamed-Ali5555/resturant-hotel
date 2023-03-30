<div class="row">
    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"title"],
      ['model_key' => 'description',"type"=>"textarea", 'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>


    @include('include.input_lang',$fields )



</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"  type="submit" class="btn btn-danger">Save</button>
    </div>
</div>
