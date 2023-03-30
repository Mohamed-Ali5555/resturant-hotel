<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Reservation</h3>
                        <p class="footer-contact-text">{{$settings['email']}}</p>
                        <div class="footer-contact-info">
                            <p class="footer-contact-phone"><span class="flaticon-call"></span> {{$settings['phone']}}</p>
                        </div>
                        <div class="footer-about-social-list">
                            <a href="{{$settings['instagram']}}" target="_blank"><i class="ti-instagram"></i></a>
                            <a href="{{$settings['twitter']}}" target="_blank"><i class="ti-twitter"></i></a>
                            <a href="{{$settings['youtube']}}" target="_blank"><i class="ti-youtube"></i></a>
                            <a href="{{$settings['facebook']}}" target="_blank"><i class="ti-facebook"></i></a>
                            <a href="{{$settings['pintrex']}}" target="_blank"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="footer-column footer-explore clearfix">
                        <h3 class="footer-title">News</h3>
                        <ul class="footer-explore-list list-unstyled">
                            @if(isset($news))
                                @foreach($news as $single_news)
                            <li><a href="{{route('show_news',[$single_news['id'],\Illuminate\Support\Str::slug($single_news['title'])])}}">{{mb_substr($single_news['title'],0,70)}}</a></li>
                                @endforeach
                          @endif
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Reservation</h3>
                        <form method="post" action="{{route('subscribe')}}">
                            @csrf
                            <input name="email" required id="email" type="email" placeholder="Email address" />
                            <input type="hidden" name="token_generate"class="token_generate">
                            <button  onclick="save_form($(this),event)" class="btn btn-dark">Subscribe </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-inner">
                        <p class="footer-bottom-copy-right">© Copyright {{Date('Y')}} KaiSol Hotels & Resorts. All Rights Reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{my_asset('frontend/')}}/js/jquery-3.6.0.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/jquery-migrate-3.0.0.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/modernizr-2.6.2.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/jquery.isotope.v3.0.2.js"></script>
<script src="{{my_asset('frontend/')}}/js/pace.js"></script>
<script src="{{my_asset('frontend/')}}/js/popper.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/bootstrap.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/scrollIt.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/jquery.waypoints.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/owl.carousel.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/jquery.stellar.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/jquery.magnific-popup.js"></script>
<script src="{{my_asset('frontend/')}}/js/YouTubePopUp.js"></script>
<script src="{{my_asset('frontend/')}}/js/select2.js"></script>
<script src="{{my_asset('frontend/')}}/js/datepicker.js"></script>
<script src="{{my_asset('frontend/')}}/js/smooth-scroll.min.js"></script>
<script src="{{my_asset('frontend/')}}/js/custom.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6LemduEjAAAAAD2CV-1sMJhUkAeaSCOlWVjgrgs3"></script>
