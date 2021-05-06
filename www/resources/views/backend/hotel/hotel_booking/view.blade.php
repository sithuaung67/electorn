@extends('backend.layouts.master')
@section('css')
<style type="text/css">
  .success-box {
    position: relative;
    margin: 0 0 30px;
  }
  .unpaid.success-box .icon {
    background: #5578eb;
    border-color: #5578eb;
  }
  .unpaid.success-box .content {
    border-color: #5578eb;
  }
  .paid.success-box .icon {
    background: green;
    border-color: green;
  }
  .paid.success-box .content {
    border-color: green;
  }
  .cancelled.success-box .icon {
    background: red;
    border-color: red;
  }
  .cancelled.success-box .content {
    border-color: red;
  }
  .success-box .icon {
    color: white;
    width: 120px;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    border: 1px solid #5578eb;
    background: #5578eb;
    text-align: center;
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-align: center;
    -webkit-box-align: center;
    align-items: center;
  }
  .success-box .content {
    border: 1px solid #5578eb;
    background: #FFF;
    margin-left: 121px;
    padding: 17px;
    color: #555;
}
.kt-container{
  color: black;
}
p {
  font-size: 14px;
}

</style>
@endsection
@section('title','Hotel Booking View')
@section('content')
  
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main mb-3">
        <h3 class="kt-subheader__title">Dashboard</h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
          <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">Hotel Booking </a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">View </a>
        </div>
      </div>
      <a href="{{route('admin.hotel.booking.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
      </a>
    </div>
  </div>

  @if($hotel_booking->booking_status_id==1)
    <div class="success-box unpaid">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fa-spinner"></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$hotel_booking->status->name}}</h4>
        <div class="clear"></div>
      </div>
    </div>
  @elseif($hotel_booking->booking_status_id==2)
    <div class="success-box paid">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fa-check-circle"></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$hotel_booking->status->name}}</h4>
        <div class="clear"></div>
      </div>
    </div>
  @else
    <div class="success-box cancelled">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fas fa-exclamation-circle "></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$hotel_booking->status->name}}</h4>
        <div class="clear"></div>
      </div>
    </div>
  @endif

  <div class="flash-message" id="successMessage">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
      @endif
    @endforeach
  </div>

  <div class="row">
    <div class="col-md-6">
    @foreach($seocond_hotel_book as $booking)
      <div class="kt-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title" style="font-size: 20px;color: black">Booking Detail</h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <div class="row">
            <div class="col-md-6">
              <p style="height: 30px;">Booking Status</p>
              <p style="height: 30px;">Booking Number</p>
              <p>Customer Name</p>
              <p>Full Name</p>
              <p>Nationality</p>
              @if($booking->nationlity==0)
                <p>NRC</p>
              @else
                <p>Passport Number</p>
              @endif
              <p>Email</p>
              <p>Phone</p>
            </div>
            <div class="col-md-6 text-right">
              <p>
                <h5>
                  @if($hotel_booking->booking_status_id==1)
                    <span class="btn btn-sm btn-info" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$hotel_booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @elseif($hotel_booking->booking_status_id==2)
                    <span class="btn btn-sm btn-success" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$hotel_booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @else
                    <span class="btn btn-sm btn-danger" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$hotel_booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @endif
                </h5>
              </p>
              <!-- Modal -->
              <div class="modal fade" id="booking_status" tabindex="-1" role="dialog" aria-labelledby="BookingStatusLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="{{route('admin.hotel.booking.status.edit',$booking->hotel_booking_id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="BookingStatusLabel">Booking Status :</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6 text-left">
                            <div class="form-group">
                              <label>Status Name</label>
                              <select name="booking_status_id" id="booking_status_id" class="form-control" style="width: 100%;">
                                <option value="{{$hotel_booking->booking_status_id}}">{{$hotel_booking->booking_status_name}}</option>
                              @if($hotel_booking->booking_status_id=="1")
                                <option value="2">Paid</option>
                                <option value="3">Cancelled</option>
                              @elseif($hotel_booking->booking_status_id=="2")
                                <option value="1">Pending</option>
                                <option value="3">Cancelled</option>
                              @else
                                <option value="1">Pending</option>
                                <option value="2">Paid</option>
                              @endif
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <p>
                <h5>
                  <span class="btn btn-sm btn-primary" style="width: 90px;">{{$booking->hotel_booking_id}}</span>
                </h5>
              </p>
              <p>{{$hotel_booking->customer_name}}</p>
              <p>{{$booking->full_name}}</p>
              <p>
                @if($booking->nationality==0)
                  {{"Local"}}
                @else
                  {{"Foreign"}}
                @endif
              </p>
              @if($booking->nationality==0)
                <p>{{$booking->nrc}}</p>
              @else
                <p>{{$booking->passport_number}}</p>
              @endif
              <p>{{$booking->gmail}}</p>
              <p>{{$booking->phone}}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    <div class="col-md-6">
      <div class="kt-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title" style="font-size: 20px;color: black">Summary</h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <div class="row">
            <div class="col-md-12">
              <h3><b>{{$hotel_booking->hotel_name}}</b></h3>
              <h5 style="color: #424242">
                @for($i= 1;$i<=$hotel_booking->hotel_rating;$i++)
                  @if($i>5)
                    @break(0);
                  @endif
                  <i class="fa fa-star" style="color: orange"></i>
                @endfor
                @if(5-$hotel_booking->hotel_rating > 0)
                  @for($i= 1;$i<=5-$hotel_booking->hotel_rating;$i++)
                    <i class="fa fa-star"></i>
                  @endfor
                @endif
              </h5>
            </div>
            <div class="col-md-12">
              <h5 style="color: #424242">
                @if($hotel_booking->address_mm)
                  <p>{!!$hotel_booking->address_mm!!}</p>
                @else
                  <p>{!!$hotel_booking->address_en!!}</p>
                @endif
              </h5>
            </div>
            <div class="col-md-8 mt-5">
              <p>Check In</p>
              <p>Check Out</p>
              <hr>
              @foreach($hotel_booking_all as $all)
              <p style="font-size: 13px;height: 40px;">{{$all->room_count}} x {{$all->room_type}} x {{$all->day_count}} Nights x {{$all->extra_count}} {{"Extra"}}</p>
              @endforeach
              <hr>
              <p>Total Amount</p>
            </div>
            <div class="col-md-4 text-right mt-5">
              <p>
                {{date('d-M-Y', strtotime($hotel_booking->check_in))}}
              </p>
              <p>
                {{date('d-M-Y', strtotime($hotel_booking->check_out))}}
              </p>
              <hr>
              @foreach($hotel_booking_all as $all)
              <p style="height: 40px;">
                {{$all->total_room_price}}
                  @if($all->price_type==0)
                    {{"MMK"}}
                  @else
                    {{"USD"}}
                  @endif
                </p>
              @endforeach
              <hr>
              <p>
                {{number_format($hotel_booking->total_price)}}
                @if($hotel_booking->price_type==0)
                  {{"MMK"}}
                @else
                  {{"USD"}}
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @foreach($seocond_hotel_book as $booking)
      @if($booking->nationality==0)
        <div class="col-md-12">
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title" style="font-size: 20px;color: black">{{$booking->full_name}} NRC Image</h3>
              </div>
            </div>
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-md-6">
                  <label>NRC Front Image</label>
                  <img src="{{$booking->nrc_front_img}}" style="width: 100%;height: 220px;" />
                </div>
                <div class="col-md-6">
                  <label>NRC Back Image</label>
                  <img src="{{$booking->nrc_back_img}}" style="width: 100%;height: 220px;" />
                </div>
              </div>
            </div>
          </div>
        </div>
      @else
        <div class="col-md-6">
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title" style="font-size: 20px;color: black">{{$booking->full_name}} Passport Image</h3>
              </div>
            </div>
            <div class="kt-portlet__body">
              <div class="row">
                <div class="col-md-12">
                  <label>Passport Front Image</label>
                  <img src="{{$booking->passport_front_img}}" style="width: 100%;height: 220px;" />
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>               
</div>  



@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $("#booking_status_id").select2();
    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 1500);
  });
</script>
@endsection