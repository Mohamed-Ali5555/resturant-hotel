<!DOCTYPE html>
<html lang="zxx">
@include('frontend.layouts.header')
<body>

<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"> <span></span> </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="logo-wrapper navbar-brand valign">
            <a href="/">
                <div class="">
                    <img src="{{getfile($settings['logo'])}}" class="logo-img" alt="">
                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-line-double"></i></span> </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item dropdown"> <a href="{{route('home')}}" class="nav-link active"> Home </a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('accommodations')}}">Accommodations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('dining')}}">Dining</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Media / Photos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('offer')}}">Offer / Hot Deals</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('activities')}}">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('spa')}}">Spa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('meeting')}}">Conference and Events</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('wedding')}}">Wedding</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('private')}}">Private Retreats</a></li>

                
                
                {{-- <li class="nav-item dropdown"> <span class="nav-link"> More ... <i class="ti-angle-down"></i></span>
                  
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item"><a href="{{route('activities')}}">Activity</a></li>
                        <li class="dropdown-item"><a href="{{route('spa')}}">Spa</a></li>
                        <li class="dropdown-item"><a href="{{route('meeting')}}">Conference and Events</a></li>
                        <li class="dropdown-item"><a href="{{route('wedding')}}">Wedding</a></li>
                        <li class="dropdown-item"><a href="{{route('contact')}}">Contact Us</a></li>
                        <li class="dropdown-item"><a href="{{route('private')}}">Private Retreats</a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        {{-- <div class="butn-light mt-30 mb-30"> <a href="{{route('check_rate')}}" style="color: white;"> <span>Check Rate</span></a></div> --}}
    </div>

</nav>

@yield('content')

@include('frontend.layouts.footer')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="send_reservation" action="{{route('reservation')}}">
                   @csrf
                   <input type="hidden" name="room_id" id="room_id_form">
                   <div class="form-group" >
                       <label class="col-form-label"> Start Date</label>
                       <input class="form-control" type="date" name="start_date" id="start_date">
                   </div>
                   <div class="form-group" >
                       <label class="col-form-label"> End Date</label>
                       <input class="form-control" type="date" name="end_date" id="end_date">
                   </div>
                   <div class="form-group" >
                       <label class="col-form-label">  Count Room</label>
                       <input class="form-control" type="number" min="0"  name="count_room" id="count_room">
                   </div>

               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="send_reservation()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@yield('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    function show_modal(id){
        $('#room_id_form').val(id)
        $('#exampleModal').modal('show')

    }
     function send_reservation(){
         start_date=$('#start_date').val()
         end_date=$('#end_date').val()
             count=$('#count_room').val()
         id=$('#room_id_form').val();
         var today='{{date('Y-m-d')}}'


         if(start_date > today==false){
             alert("Start Date Must Be After Current DATE")
         }
         else if(start_date > end_date==true){
             alert("Start Date Must Be After End DATE")
         }
          else if (count<1){
              alert("Must Be Add count Room")
          }
          else{
              $.ajax({
                  type:"get",
                  url:"{{route('check_reservation')}}",
                  data:{start_date:start_date,end_date:end_date,count:count,id:id},
                  success:function (data){
                     if(data=='true'){
                         $('#send_reservation').submit()
                     }
                  }
              })
         }


     }


    function save_form(element,event) {

        event.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LemduEjAAAAAD2CV-1sMJhUkAeaSCOlWVjgrgs3').then(function(token) {

                $('.token_generate').val(token)

                var post=$(element).parents('form').attr('method');



                var form=$(element).parents('form')[0];



                var data = new FormData(form);

                // var data=data.escape(text);
                // $(this).serialize();
                var url=$(element).parents('form').attr('action');


                $.ajax({
                    type: post,
                    url: url,
                    data: data,
                    dataty: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {


                        toastr["success"]("Success  ", "Ok")


                        window.location.href = '{{route('home')}}';



                    },
                    error: function (error) {
                        console.log(error)
                        if (error.status === 422) {

                            const errors = error.responseJSON.errors
                            const first_item = Object.keys(errors)[0]
                            const first_dom = document.getElementById(first_item)
                            const first_message = errors[first_item][0]

                            toastr["error"](" " + first_message, "Error")


                            first_dom.scrollIntoView({behavior: "smooth"})
                            const error_message = document.querySelectorAll('.text-danger')
                            error_message.forEach((element) => element.textContent = '')
                            first_dom.insertAdjacentHTML('afterend', '<div class="text-danger">' + first_message + '</div>')
                            const dom_error = document.querySelectorAll('.form-control')
                            dom_error.forEach((element) => element.classList.remove('border', 'border-danger'))
                            first_dom.classList.add('border', 'border-danger')


                        } else {
                            toastr["error"](" Error", "Error")
                        }


                    }
                });
            });
        })


    }
</script>
</body>


</html>
