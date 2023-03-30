
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">الاسم</label>
    <div class="col-sm-10">
        <input type="text" name="name" value="{{$row['name']??''}}" class="form-control" id="name" placeholder="الاسم">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">البريد الالكتروني</label>
    <div class="col-sm-10">
        <input type="email" name="email" value="{{$row['email']??''}}" class="form-control" id="email" placeholder="البريد اللكتروني">
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">الهاتف </label>
    <div class="col-sm-10">
        <input dir="ltr" type="text"value="{{$row['phone']??''}}" name="phone" class="form-control ltr" style="direction: ltr" data-inputmask="&quot;mask&quot;: &quot;(+999) 999-999-9999&quot;" data-mask="" inputmode="text">
    </div>
</div>
<div class="form-group ">

    <label for="projectinput1">  {{ucfirst('الصورة الشخصية')}}  </label>
    <div class="pernt_image">
        <img class="show_image" width="100px" height="100px" src="{{isset($row['image'])?getfile($row['image']): getfile(0)}}">
    </div>
    <span id="image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fas fa-upload"></i> تحميل</span>
    <input  class="input_upload " type="file"


            class="form-control"

            name="image">
    @error('image')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

@if(isset($row))

    @else
    <input type="hidden" name="user_type" value="{{$type}}">
<div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">الرمز السري</label>
    <div class="col-sm-10">
        <input autocomplete="new-password" type="password" name="password" value="" class="form-control" id="password" placeholder="الرمز السري الجديد">
    </div>
</div>
@endif

<div class="form-group row">
    <div class="offset-sm-2 col-sm-10">
        <button onclick="save_form($(this),event)"  type="submit" class="btn btn-danger">حفظ</button>
    </div>
</div>
