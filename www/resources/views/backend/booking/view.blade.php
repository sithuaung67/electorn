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
@section('title','Booking View')
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
          <a href="" class="kt-subheader__breadcrumbs-link">Booking </a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">View </a>
        </div>
      </div>
      <a href="{{route('admin.booking.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
      </a>
    </div>
  </div>

  @if($booking->booking_status_id==1)
    <div class="success-box unpaid">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fa-spinner"></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$booking->status->name}}</h4>
        <div class="clear"></div>
      </div>
    </div>
  @elseif($booking->booking_status_id==2)
    <div class="success-box paid">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fa-check-circle"></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$booking->status->name}}</h4>
        <div class="clear"></div>
      </div>
    </div>
  @else
    <div class="success-box cancelled">
      <div class="icon">
        <span style="margin-left: 45px;font-size: 30px;"><i class="fa fas fa-exclamation-circle "></i></span>
      </div>
      <div class="content">
        <h4 style="color: black;">Your booking status is {{$booking->status->name}}</h4>
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
    @foreach($seocond_book as $booking)
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
              <p>First Name</p>
              <p>Last Name</p>
              <p>Nationality</p>
              <p>Passport Number</p>
              <p>Issue Date</p>
              <p>Expire Date</p>
              <p>Email</p>
              <p>Phone</p>
              <p>Note</p>
            </div>
            <div class="col-md-6 text-right">
              <p>
                <h5>
                  @if($booking->booking_status_id==1)
                    <span class="btn btn-sm btn-info" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @elseif($booking->booking_status_id==2)
                    <span class="btn btn-sm btn-success" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @else
                    <span class="btn btn-sm btn-danger" data-toggle="modal" data-target="#booking_status" style="width: 90px;">{{$booking->booking_status_name}} <i class="fa fa-edit"></i></span>
                  @endif
                </h5>
              </p>
              <!-- Modal -->
              <div class="modal fade" id="booking_status" tabindex="-1" role="dialog" aria-labelledby="BookingStatusLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="{{route('admin.booking.status.edit',$booking->booking_id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                                <option value="{{$booking->booking_status_id}}">{{$booking->booking_status_name}}</option>
                              @if($booking->booking_status_id=="1")
                                <option value="2">Paid</option>
                                <option value="3">Cancelled</option>
                              @elseif($booking->booking_status_id=="2")
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
                  <span class="btn btn-sm btn-primary" style="width: 90px;">{{$booking->booking_id}}</span>
                </h5>
              </p>
              <p>{{$booking->customer_name}}</p>
              <p>{{$booking->first_name}}</p>
              <p>{{$booking->last_name}}</p>
              <p>{{$booking->nationality}}</p>
              <p>{{$booking->passport_number}}</p>
              <p>
                {{date('d-M-Y', strtotime($booking->issue_date))}}
              </p>
              <p>
                {{date('d-M-Y', strtotime($booking->expire_date))}}
              </p>
              <p>{{$booking->email}}</p>
              <p>{{$booking->phone}}</p>
              <p>{{$booking->note}}</p>
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
            <div class="col-md-6">
              <p>Package Name</p>
              <p>Total Amount</p>
            </div>
            <div class="col-md-6 text-right">
              <p>{{$booking->package_name}}</p>
              <p>USD ${{$booking->total_price}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
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