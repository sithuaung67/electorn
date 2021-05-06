@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Booking Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Booking </a>
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
                <div class="col-md-10">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Booking</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{ route('admin.booking.index') }}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.booking.update',$booking->id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group">
                            <label>BookingId</label>
                            <input type="text" class="form-control" name="booking_id" id="booking_id" aria-describedby="" placeholder="" value="{{$booking->booking_id}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('booking_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>CustomerId</label>
                             <input type="text" class="form-control" name="customer_id" id="customer_id" aria-describedby="" placeholder="" value="{{$booking->customer_id}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('customer_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>PackageId</label>
                             <input type="text" class="form-control" name="package_id" id="package_id" aria-describedby="" placeholder="" value="{{$booking->package_id}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('package_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>FirstName</label>
                             <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="" placeholder="" value="{{$booking->first_name}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>LastName</label>
                             <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="" placeholder="" value="{{$booking->last_name}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Nationality</label>
                             <input type="text" class="form-control" name="nationality" id="nationality" aria-describedby="" placeholder="" value="{{$booking->nationality}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('nationality') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>PassportNumber</label>
                             <input type="text" class="form-control" name="passport_number" id="passport_number" aria-describedby="" placeholder="" value="{{$booking->passport_number}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('passport_number') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>IssueDate</label>
                             <input type="text" class="form-control" name="issue_date" id="issue_date" aria-describedby="" placeholder="" value="{{$booking->issue_date}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('issue_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>ExpireDate</label>
                             <input type="text" class="form-control" name="expire_date" id="expire_date" aria-describedby="" placeholder="" value="{{$booking->expire_date}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('expire_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Email</label>
                             <input type="text" class="form-control" name="email" id="email" aria-describedby="" placeholder="" value="{{$booking->email}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('email') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Phone</label>
                             <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" placeholder="" value="{{$booking->phone}}" style="height: auto;">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Status</label>
                             <select class="form-control" name="booking_status_id" id="booking_status_id" aria-describedby="" placeholder="" style="height: auto;">
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
                            <span class="text-danger">{{ $errors->first('booking_status_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Note</label>
                             <textarea class="form-control" name="note" id="note" aria-describedby="" placeholder="" style="height: 70px;">{{$booking->note}}</textarea>
                            <span class="text-danger">{{ $errors->first('note') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary form-control">Update</button>
                                 
                                </div>
                                
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary form-control">Cancel</a>
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
    $('#expire_date').datetimepicker();
    $('#issue_date').datetimepicker();
    $('#booking_status_id').select2();
    $('#note').summernote({
      height: 300, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
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