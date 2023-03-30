@foreach($fields as $input)



    @foreach(all_lang() as $key=>$lang)

        @if(isset($input['type'])&& in_array($input['type'],['area','textarea']))

            <div class="col-12">
                <div class="form-group">
                    <label>  {{$input['model_name']}}

                    @if(count(all_lang())>1)
                         باللغة   {{$lang['native']}}
                        @endif
                    </label>
                    <textarea id="{{$key}}.{{$input['model_key']}}" class="form-control {{$input['type']=='textarea'?'textarea':''}}" rows="3"
                              name="{{$key}}[{{$input['model_key']}}]">{{isset($input['model'])?$input['model']->getTranslationOrNew($key)[$input['model_key']]:''}}</textarea>
                </div>
            </div>

        @else


        <div class="col-md-6">
            <div class="form-group">
                <label>  {{$input['model_name']}}

                    @if(count(all_lang())>1)
                        باللغة   {{$lang['native']}}
                    @endif
                </label>
                <input required type="text" name="{{$key}}[{{$input['model_key']}}]" value="{{isset($input['model'])?$input['model']->getTranslationOrNew($key)[$input['model_key']]:''}}" id="{{$key}}.{{$input['model_key']}}" class="form-control"
                       placeholder="{{$input['model_name']}}">
            </div>
        </div>
        @endif
    @endforeach



@endforeach
