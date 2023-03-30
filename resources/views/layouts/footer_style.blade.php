

<script src="{{my_asset('admin')}}/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{my_asset('admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{my_asset('admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script data-name="basic">
    (function(){
// The DOM element you wish to replace with Tagify
        var input = document.querySelector('.basic_tag');

// initialize Tagify on the above input node reference
        new Tagify(input)
    })()
</script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{my_asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{my_asset('admin')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{my_asset('admin')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
{{--<script src="{{my_asset('admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="{{my_asset('admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{my_asset('admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{my_asset('admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{my_asset('admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{my_asset('admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{my_asset('admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="{{my_asset('admin')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="{{my_asset('admin')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{my_asset('admin')}}/dist/js/demo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>



<script src="{{my_asset('admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/jszip/jszip.min.js"></script>

{{--<script src="{{my_asset('admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>--}}
<script src="{{my_asset('admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{my_asset('admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{my_asset('admin')}}/dist/js/pages/dashboard.js"></script>



@include('admin.ckeditor')


<script>
    let images = $('#images');
    let resumable_file = new Resumable({
        target: '{{ route('files.upload.large') }}',
        chunkSize:1024*1024,
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        // fileType: ["jpg", "jpeg", "png",
        //     "webp"],
        headers: {
            'Accept' : 'application/json'
        },

        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable_file.assignBrowse(images[0]);

    resumable_file.on('fileAdded', function (file) { // trigger when file picked
        var   text=file.fileName
        var split=text.split(/[\s.]+/)
        const last = split[split.length - 1]
        var array= ["jpg", "jpeg", "png",
            "webp"]
        // if(array.includes(last)) {

        $('.progress').css("height", '25px')
        $('.save_form').prop('disabled', true);
        showProgress();
        progress.find('.progress-bar').removeClass('bg-success');
        resumable_file.upload() // to actually start uploading.
        // }else {
        //     toastr["error"](" يجب ان يكون الملف صورة" , "خطاء")
        // }
    });

    resumable_file.on('fileProgress', function (file) { // trigger when file progress update
        $('.save_form').prop('disabled', true);
        updateProgress(Math.floor(file.progress() * 100));
    });


    resumable_file.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        console.log(response)
        $('.save_form').prop('disabled', false);
        progress.find('.progress-bar').addClass('bg-success');

        //



            var file='<img title="'+response.name+'" src="'+response.file+'"  style="margin: 5px;width: 100px"> '


        var item='<div class="col-3 single_image_upload"  > ' +
            ' <input type="hidden" name="photos[]" value="'+response.id+'"  >'+
            '<span class="btn" onclick="remove_image($(this),'+response.id+')"> ' +
            '- ' +
            '</span> ' +file+
            '</div>';
        $("#images_vue").append(item)

        // $('.card-footer').show();
    });

    resumable_file.on('fileError', function (file, response) { // trigger when there is any error
        console.log(response)
        alert('file uploading error.')
        updateProgress(0);
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
    function remove_image(element,id){
        $.ajax({
            type:"get",
            url:"{{route("remove_image")}}",
            data:{id:id},
            success:function (data){
                $(element).parents(".single_image_upload").remove()
            }
        })
    }

</script>


<script>







    function upload_image(element){
        $(element).siblings('input').click();
    }
function upload_video(element){
    if (element.files && element.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {


            $(element).siblings('.pernt_image').find('source').attr('src', e.target.result);
        }

        reader.readAsDataURL(element.files[0]);
    }

}

    $(document).ready(function() {
        "use strict"
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
        $('.selectpicker').selectpicker()
        $('.select').select2()
        var readURL = function(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {


                    $(input).siblings('.pernt_image').find('.show_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        var mulable = function(input) {

            var total_file=$(input).get(0).files.length;

            for(var i=0;i<total_file;i++)
            {
                $(input).siblings('.pernt_image').append("<img style='margin: 5px' width='70px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }
        }


        $(".input_upload").on('change', function(){
            readURL(this);
        });

        $('.input_uploads').on('change',function (){
            $(this).siblings('.pernt_image').html('');

            mulable($(this))
        });



    });
    function input_file_change(element){



        const [file] = $(element).files[0]

        if (file) {


            element.siblings('.pernt_image').find('.show_image').attr('src',URL.createObjectURL(file));
        }
    }
     function upload_tet(input){
         if (input.files && input.files[0]) {

             var reader = new FileReader();

             reader.onload = function (e) {


                 $(input).siblings('.pernt_image').find('.show_image').attr('src', e.target.result);
             }

             reader.readAsDataURL(input.files[0]);
         }
     }
    function view_image(element){
    }

    function add_debart (e,a) {

        a.preventDefault();
        var remove="";
        $('.department').find('select').select2("destroy")
        remove="<button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button> ";
        //debart=e.parents('.row').find('.form_debart')
        x= e.parents(".department").find('.form_debart:first').clone();

        x.find('input').val('')
        y= x.find('.remove_ro').html(remove);


        e.parents(".department").append(x)
        $('.department').find("select").select2();


    }
    function add_debart_plan (e,a) {

        a.preventDefault();
        var remove = "";

        var len= $('.depart_plan').find('.form_debart').length

        x_imag=$('#x_image').val()
        y_imag=$('#y_image').val()
        w_imag=$('#w_image').val()
        h_imag=$('#h_image').val()
        last_plan=$('.plan_name:last').val()
         if(x_imag>0 ) {

             $('#x_image').val(" ")

             if ($('.depart_plan').hasClass("d-none")) {

                 $('.depart_plan').removeClass("d-none")
                 $('.depart_plan').find('.x_image_plan:last').val(x_imag)
                 $('.depart_plan').find('.y_image_plan:last').val(y_imag)
                 $('.depart_plan').find('.h_image_plan:last').val(h_imag)
                 $('.depart_plan').find('.w_image_plan:last').val(w_imag)

             } else if (last_plan!='') {
                 remove = "<button class='btn btn-danger'  onclick='remove(this,event)'> <i class='fa fa-trash'> </i></button> ";
                 //debart=e.parents('.row').find('.form_debart')
                 x = $(".depart_plan").find('.form_debart:first').clone();

                 x.find('input').val('')
                x.find('.x_image_plan:last').val(x_imag)
                 x.find('.y_image_plan:last').val(y_imag)
                 x.find('.h_image_plan:last').val(h_imag)
                 x.find('.w_image_plan:last').val(w_imag)
                 y = x.find('.remove_ro').html(remove);



                 $(".depart_plan").append(x)

             }
         }else {
             alert("Select Part")
         }


    }
    function remove(e,a) {
        a.preventDefault();
        $(e).parents('.form_debart').remove();
    }


    function save_form(element,event) {

        event.preventDefault();
        var post=$(element).parents('form').attr('method');

        $('.textarea').each(function () {
            var ed = tinyMCE.get($(this).attr('id'));

            var text = ed.getContent();
            $(this).text(text)

        })

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


            location.reload()



                },
                error: function (error) {
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


    }

</script>
<script>

    // $("table").DataTable({
    //     "responsive": true, "lengthChange": false, "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

    $('.datatable').DataTable( {

        responsive:true,
        autoWidth:false,
        dom: 'Bfrtip',
        buttons: [
            {

                extend: 'print',
                text:'Print',
                exportOptions: {
                    columns: ':visible',

                }
            },{
                extend: 'excel',
                text:'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },


        ],

        columnDefs: [
            {
                "orderSequence": ["desc", "asc"],
                type: 'numeric-comma', targets: 0
            }
        ],
        "language": {
            "sSearch": "Search ...:   ",
            "sEmptyTable": "Empty Table",
            "oPaginate": {
                "sNext": "Next",
                "sPrevious": "Previous",
                "info": "Show page _PAGE_ From _PAGES_",
            }
        }
    } );
    function delete_confirm(element,event){
        var form =  $(element).closest("form");

        event.preventDefault();

        swal({
            title: `هل أنت متأكد من حذف هذا العنصر؟`,
            text: " سيتم حذف بيانات هذا العنصر بالكامل ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    }

</script>
