<?php
$url=Url()->current();

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link text-center d-block">
        <img src="{{getfile($settings['logo']??0)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <br>
        <span class="brand-text font-weight-light">{{$settings['name']??''}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{getfile(auth()->user()['image'])}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()['name']}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link @if($url==asset('/'))) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>


                @if(auth()->user()['user_type']=='admin')
                    <li class="nav-item ">
                        <a href="{{route('settings.index')}}" class="nav-link @if(preg_match('/settings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('options.index')}}" class="nav-link @if(preg_match('/options/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Options</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('roomviews.index')}}" class="nav-link @if(preg_match('/roomviews/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Views</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('categories.index')}}" class="nav-link @if(preg_match('/categories/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('rooms.index')}}" class="nav-link @if(preg_match('/rooms/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rooms</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('sliders.index')}}" class="nav-link @if(preg_match('/sliders/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sliders</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('policies.index')}}" class="nav-link @if(preg_match('/policies/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Policies</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('phototypes.index')}}" class="nav-link @if(preg_match('/phototypes/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Albums</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('videos.index')}}" class="nav-link @if(preg_match('/videos/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Video</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('dinings.index')}}" class="nav-link @if(preg_match('/dinings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dining</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('restaurants.index')}}" class="nav-link @if(preg_match('/restaurants/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Restaurant</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('mealtypes.index')}}" class="nav-link @if(preg_match('/mealtypes/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Meal Types</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('meals.index')}}" class="nav-link @if(preg_match('/meals/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Meal</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('offers.index')}}" class="nav-link @if(preg_match('/offers/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Offer</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('activities.index')}}" class="nav-link @if(preg_match('/activities/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Activity</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('divings.index')}}" class="nav-link @if(preg_match('/divings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Diving</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('spas.index')}}" class="nav-link @if(preg_match('/spas/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Spa</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('spaitems.index')}}" class="nav-link @if(preg_match('/spaitems/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>spa item</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('itemspas.index')}}" class="nav-link @if(preg_match('/itemspas/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Item Spa</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('resorts.index')}}" class="nav-link @if(preg_match('/resorts/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>resort</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('meetings.index')}}" class="nav-link @if(preg_match('/meetings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Meeting</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('meetingitems.index')}}" class="nav-link @if(preg_match('/meetingitems/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Meeting Item</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('weddings.index')}}" class="nav-link @if(preg_match('/weddings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Wedding</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('weddingitems.index')}}" class="nav-link @if(preg_match('/weddingitems/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Wedding Item</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('itemwediings.index')}}" class="nav-link @if(preg_match('/itemwediings/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Item Wedding</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('contacts.index')}}" class="nav-link @if(preg_match('/contacts/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('request_reservation')}}" class="nav-link @if(preg_match('/request_reservation/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Request Reservation</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('approved_reservation')}}" class="nav-link @if(preg_match('/approved_reservation/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Approved Reservation</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('subscribes.index')}}" class="nav-link @if(preg_match('/subscribes/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>subscribes</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('news.index')}}" class="nav-link @if(preg_match('/news/i',$url)) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
{{--                    <li class="nav-item ">--}}
{{--                        <a href="{{route('albums.index')}}" class="nav-link @if(preg_match('/albums/i',$url)) active @endif">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>Albums Image</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}






                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
