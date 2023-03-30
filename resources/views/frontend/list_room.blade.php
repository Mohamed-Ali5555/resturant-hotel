
@foreach($rooms as $room)


    <div class="col-md-4">
        <div class="square-flip">
            <div class="square bg-img" style="background-image: url('{{getfile($room['image'])}}')" >
                <span class="category"><a href="booking.html">Book</a></span>
                <div class="square-container d-flex align-items-end justify-content-end">
                    <div class="box-title">
                        @if(priceroom($room['id'],date('Y-m-d'))>0)
                            <h6>{{priceroom($room['id'],date('Y-m-d'))}}$ / Night</h6>
                        @endif
                        <h4>{{$room['name']}}</h4>
                    </div>
                </div>
                <div class="flip-overlay"></div>
            </div>
            <div class="square2">
                <div class="square-container2">
                    @if(priceroom($room['id'],date('Y-m-d'))>0)
                        <h6>{{priceroom($room['id'],date('Y-m-d'))}}$ / Night</h6>
                    @endif
                    <h4>{{$room['name']}}</h4>
                    <p>{{mb_substr(strip_tags($room['description']),0,100)}}</p>
                    <div class="row room-facilities mb-30">
                        @foreach($room->options()->take(4)->get() as $option)
                            <div class="col-md-6">
                                <ul>
                                    <li><i class="fa {{$option['icon']}}"></i> {{$option['pivot']['short_value']}}</li>

                                </ul>
                            </div>
                        @endforeach

                    </div>
                    <div class="btn-line"><a href="{{route('show_rom',[$room['id'],\Illuminate\Support\Str::slug($room['name'])])}}">Details</a></div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
