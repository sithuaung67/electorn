@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Hotel Booking Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Hotel Booking </a>
              <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link">edit </a>
          </div>
        </div>
      </div>
    </div>

    <div class="flash-message" id="successMessage">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row justify-content-center">
                <div class="col-md-9">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Hotel Booking</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{ route('admin.hotel.booking_edit.view',$hotel_booking->hotel_booking_id) }}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.hotel.booking.each.update',$hotel_booking->id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                            <label>Hotel Booking Name</label>
                            <select class="form-control" name="hotel_booking_id" id="hotel_booking_id" aria-describedby="" placeholder="" value="{{$hotel_booking->hotel_booking_id}}" style="height: auto;">
                              <option value="{{$hotel_booking->hotel_booking_id}}">{{$hotel_booking->hotel_booking_id}}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('hotel_booking_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Customer Name</label>
                             <select class="form-control" name="customer_id" id="customer_id" aria-describedby="" placeholder="" style="height: auto;">
                               <option value="{{$hotel_booking->customer_id}}">{{$hotel_booking->customer_name}}</option>
                             </select>
                            <span class="text-danger">{{ $errors->first('customer_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Hotel</label>
                             <select class="form-control" name="hotel_id" id="hotel_id" aria-describedby="" placeholder="" style="height: auto;">
                               <option value="{{$hotel_booking->hotel_id}}">{{$hotel_booking->hotel_name}}</option>
                             </select>
                            <span class="text-danger">{{ $errors->first('hotel_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Check In Date</label>
                             <input type="text" class="form-control" name="check_in" id="check_in" aria-describedby="" placeholder="" value="{{$hotel_booking->check_in}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('check_in') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Check Out Date</label>
                             <input type="text" class="form-control" name="check_out" id="check_out" aria-describedby="" placeholder="" value="{{$hotel_booking->check_out}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('check_out') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Price Type</label>
                             <select class="form-control" name="price_type" id="price_type" aria-describedby="" placeholder="" value="{{$hotel_booking->price_type}}" style="height: auto;">
                               @if($hotel_booking->price_type==0)
                                <option value="0">MMk</option>
                                <option value="1">USD</option>
                               @else
                                <option value="1">USD</option>
                                <option value="0">MMk</option>
                               @endif
                             </select>
                            <span class="text-danger">{{ $errors->first('price_type') }}</span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Total Price</label>
                             <input type="text" class="form-control" name="total_price" id="total_price" aria-describedby="" placeholder="" value="{{$hotel_booking->total_price}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('total_price') }}</span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Room Type</label>
                            <select class="form-control" name="room_id" id="room_id" aria-describedby="" placeholder="" style="height: auto;">
                              <option value="{{$hotel_booking->room_id}}">{{$hotel_booking->room_type}}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('nationality') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Status</label>
                             <select class="form-control" name="booking_status_id" id="booking_status_id" aria-describedby="" placeholder="" style="height: auto;">
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
                            <span class="text-danger">{{ $errors->first('booking_status_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary form-control">Update</button>
                                 
                                </div>
                                
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <a href="{{ route('admin.hotel.booking.index') }}" class="btn btn-secondary form-control">Cancel</a>
                                </div>
                                
                              </div>
                          </div>
                        </div>
                        </div>
                      </div>

                    </form>

                    <!--end::Form-->
                  </div>

                </div>      
              </div>
            </div>
  </div>   
 
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#check_in').datetimepicker();
    $('#check_out').datetimepicker();
    $('#booking_status_id').select2();
    $('#customer_id').select2();
    $('#hotel_id').select2();
    $('#nationality').select2();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {    
    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 1500);
  });
</script>
@endsection