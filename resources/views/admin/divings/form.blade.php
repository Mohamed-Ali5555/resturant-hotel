<div class="row">


    <?php
    $fields = [
        ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Diving"],
      ['model_key' => 'description', "type"=>"area" ,'model' => isset($row) ? $row : null, 'model_name' =>"Description"],


    ];
    ?>
    @include('include.input_lang',$fields )
</div>

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"   type="submit" class="btn btn-danger">save</button>
    </div>
</div>
