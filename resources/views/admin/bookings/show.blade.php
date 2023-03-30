@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Request Reservation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Request Reservation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="card-body">
                   <div class="row">
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Name: {{$row['first_name']." ".$row['last_name']}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Email: {{$row['email']}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Phone: {{$row['phone']}}</label>
                       </div>
                       <div class="col-md-6 ">
                           <label class="btn-danger d-block p-1"> Country: {{$row['country']}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Room: {{$row['rooms']['name']??''}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Start Date: {{$row['start_date']??''}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> End Date: {{$row['end_date']??''}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Count Room: {{$row['count_room']??''}}</label>
                       </div>
                       <div class="col-md-6">
                           <label class="btn-danger d-block p-1"> Status:
                               @if($row["status"]==1)
                                   Request
                               @elseif($row['status']==2)
                                   Approved
                               @else
                                   Cansle
                                   @endif

                               </label>
                       </div>

                       <div class="col-md-6">

                           <?php
                           $start= new DateTime($row['start_date']);
                           $end_time= new DateTime($row['end_date']);
                           //                                $end_date= new DateTime( date('Y-m-d',strtotime("+1 days",strtotime($row['end_date']))));
                           $difrent=$end_time->diff($start)->format("%a");


                           $interval = DateInterval::createFromDateString('1 day');
                           $period = new DatePeriod($start, $interval, $end_time);
                           $days=[];
                           $price=0;
                           $discount=check_offer($row['room_id'],$row['start_date'],$row['end_date'],
                               $row["count_room"],$difrent);
                           foreach ($period as $key=>$dt) {
                               $day_price=priceroom($row['room_id'],$dt->format("Y-m-d"));
                               if($discount>0){
                                   $day_price=$day_price-(($day_price*$discount)/100);
                               }
                               $price +=$day_price;
                               $days[$key]['day']=$dt->format("Y-m-d");
                               $days[$key]['price']=$day_price;
                           }

                           $service_charge=number_format($price*($settings['service_charge']/100),2);
                           $vat=number_format($price*($settings['vat']/100),2);

                           ?>
                           <ul class=list-unstyled>

                               @if($discount>0)

                                   <li><a>{{$difrent }} Days  {{$discount}}% Off</a></li>
                               @endif
                               <li><a>Average Rate <span style="font-size: 20px;"> USD {{number_format(($price/$difrent),2)}}</span></a></li>
                                   @foreach($days as $day)
                                       <li><a>{{$day['day']}} <span style="font-size: 20px;"> USD {{$day['price']}}</span></a></li>
                                   @endforeach
                           </ul>
                               <div class="widget-title">
                                   <h6>Total Room Rates :<span> USD {{$price}}</span></h6>
                               </div>
                               <div class="widget-title">
                                   <h6>Service Charge ({{$settings['service_charge']}}%) :
                                       <span> USD {{$service_charge}}</span></h6>
                               </div>
                               <div class="widget-title">
                                   <h6>VAT ({{$settings['vat']}}%) : <span> USD {{$vat}}</span> </h6>
                               </div>
                               <div class="widget">
                                   <h6>Estimated Total: USD {{$price+$vat+$service_charge}}</h6>
                               </div>

                       </div>


                       @if($row['status']==1)
                           <label class="col-form-label m-3" for="approved">
                               Approved

                           </label>
                           <input type="radio" id="approved" name="status" value="2">
                           <label class="col-form-label m-3" for="cancel">
                               Cancel

                           </label>
                           <input type="radio" id="cancel" name="status" value="1">

                           @endif
                       <br>
                       <button onclick="save_status_res('{{$row['id']}}')" class="btn btn-success"> Save</button>

                   </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section("js")
    <script>
        function save_status_res(id){

            if($('#approved').is(':checked')){
                status=2
            }
            else if($('#cancel').is(':checked')){
                status=0
            }
            else {
                status=-1
                toastr["error"](" Must Be Chose Approved Or Cancel" , "error")
            }
             if(status>-1){
                 $.ajax({
                     type:"get",
                     url:"{{route("change_reservation")}}",
                     data:{id:id,status:status},
                     success:function (data){
                         toastr["success"]("Success Update  ", "Ok")
                         location.reload()
                     }
                 })
             }

        }
    </script>
@endsection

