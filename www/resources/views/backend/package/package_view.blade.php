@extends('backend.layouts.master')
@section('css')
<style type="text/css">
    #package th{
        color: black;
    }
    #package td{
        color: black;
    }
    .kt-container{
        color: black;
    }
    .nav-link{
        color: blue;
    }
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    </style>

@endsection
@section('title','Package View')
@section('content')
  
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">Package </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">View </a>
            </div>
        </div>
      </div>
    </div>
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Package View ( {{$packages->tour_code}} )</h3>&nbsp;&nbsp;
                            <h3 class="kt-portlet__head-title">
                                @if($packages->pin=='1')
                                    <span class="btn btn-primary btn-sm">{{"PinYes"}}</span>
                                @else
                                    <span class="btn btn-danger btn-sm">{{"PinNo"}}</span>
                                @endif
                            </h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.package.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
                    <div class="kt-portlet__head mt-4">
                        <div class="kt-portlet__head-label mb-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                @for($i=0;$i<count($package_img);$i++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
                                @endfor
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block w-100" src="../../../../uploads/package/{{$package_img[0]}}" style="width: auto;height: 350px;">
                                </div>

                                @if(count($package_img) > 1)
                                    @for($i=1;$i<count($package_img);$i++)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="../../../../uploads/package/{{$package_img[$i]}}" style="width: auto;height: 350px;">
                                    </div>
                                    @endfor
                                @endif
                               
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3">
                        <li class="nav-item">
                            <a class="nav-link active" id="myanmar-tab" data-toggle="pill" href="#myanmar" role="tab" aria-controls="myanmar" aria-selected="false">မြန်မာ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="english-tab" data-toggle="pill" href="#english" role="tab" aria-controls="english" aria-selected="true">English</a>
                        </li>                          
                    </ul>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="english" role="tabpanel" aria-labelledby="english-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><b>{{$packages->package_name_en}}</b></h3>
                                        <h5 style="color: #424242">{{$packages->duration_en}}</h5>
                                    </div>
                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Extra Bed <br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->extra_bed_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Without Extra BedRoom Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->without_extra_bed_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Single<br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->single_room_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Twin Share<br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->twin_share_room_price)}} </b>
                                        </h4>   
                                    </div>
                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Discount <br> Price</b></label>
                                        @if($packages->twin_share_room_price==$packages->discount_price)
                                            <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                                <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->discount_price)}} </b>
                                            </h4>
                                        @else
                                            <h4 style="text-align:center; background: red;color: white; padding:5px; border-radius:50px;">
                                                <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->discount_price)}} </b>
                                            </h4>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <label><h4>Travel Date</h4></label>
                                        <h5 style="color: #424242"><i class="fa fa-calendar-alt"></i> {{date('d M , Y', strtotime($packages->start_date))}} - {{date('d M , Y', strtotime($packages->end_date))}}</h5>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <label><h4>Description</h4></label>
                                        <h4>{!! $packages->itinerary_en !!}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="myanmar" role="tabpanel" aria-labelledby="myanmar-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><b>{{$packages->package_name_mm}}</b></h3>
                                        <h5 style="color: #424242">{{$packages->duration_mm}}</h5>
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Extra Bed<br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->extra_bed_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Without Extra BedRoom Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->without_extra_bed_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Single<br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->single_room_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Twin Share<br> Room Price</b></label>
                                        <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                            <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->twin_share_room_price)}} </b>
                                        </h4>   
                                    </div>

                                    <div class="col-md-2 mt-5 text-center">                                        
                                        <label style="font-size: 12px;"><b>Discount <br> Price</b></label>
                                        @if($packages->twin_share_room_price==$packages->discount_price)
                                            <h4 style="text-align:center; background:rgb(237, 139, 0);color: white; padding:5px; border-radius:50px;">
                                                <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->discount_price)}} </b>
                                            </h4>
                                        @else
                                            <h4 style="text-align:center; background: red;color: white; padding:5px; border-radius:50px;">
                                                <b style="font-size: 15px;font-weight: 400"> USD {{number_format($packages->discount_price)}} </b>
                                            </h4>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-5">
                                        <label><h4>Travel Date</h4></label>
                                        <h5 style="color: #424242"><i class="fa fa-calendar-alt"></i> {{date('d M , Y', strtotime($packages->start_date))}} - {{date('d M , Y', strtotime($packages->end_date))}}</h5>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <label><h4>Description</h4></label>
                                        <h4>{!! $packages->itinerary_mm !!}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>  
@endsection
@section('script')
<script>
$(document).ready(function(){
    $("img").addClass("img-responsive");
    $("img").css("max-width", "100%");
});
</script>
@endsection