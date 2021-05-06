  @extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Customer Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Customer </a>
              <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link">edit </a>
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
                          <h3 class="kt-portlet__head-title">Customer</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.customer.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.customer.update',$customer->customer_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="customer_image" id="customer_image" aria-describedby="" placeholder="" style="height: auto;" onchange="loadFileOne(event)">
                            <span class="text-danger">{{ $errors->first('customer_image') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @if($customer->customer_image)
                              <img id="image_one" src="../../../../uploads/customer/{{$customer->customer_image}}" width="100%" height="200" />
                            @else
                              <img id="image_one" src="{{asset('../../favicon.ico')}}" width="100%" height="200" />
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->name }}" required="required">
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Customre Type</label>
                            <input type="text" class="form-control" name="customer_type" id="customer_type" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->customer_type }}">
                            <span class="text-danger">{{ $errors->first('customer_type') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->phone }}" required="required">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone Email Google</label>
                            <input type="text" class="form-control" name="phone_email_google" id="phone_email_google" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->phone_email_google }}">
                            <span class="text-danger">{{ $errors->first('phone_email_google') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gmail</label>
                            <input type="email" class="form-control" name="gmail" id="gmail" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->gmail }}">
                            <span class="text-danger">{{ $errors->first('gmail') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Birthday</label>
                            <input type="text" class="form-control" name="birthday" id="birthday" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->birthday }}">
                            <span class="text-danger">{{ $errors->first('birthday') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Passport Number</label>
                            <input type="text" class="form-control" name="passport_number" id="passport_number" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->passport_number }}" required="required">
                            <span class="text-danger">{{ $errors->first('passport_number') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Issue Date</label>
                            <input type="text" class="form-control" name="issue_date" id="issue_date" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->issue_date }}" required="required">
                            <span class="text-danger">{{ $errors->first('issue_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Expire Date</label>
                            <input type="text" class="form-control" name="expire_date" id="expire_date" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->expire_date }}" required="required">
                            <span class="text-danger">{{ $errors->first('expire_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Total Point</label>
                            <input type="text" class="form-control" name="total_point" id="total_point" aria-describedby="" placeholder="" style="height: auto;" value="{{ $customer->total_point }}">
                            <span class="text-danger">{{ $errors->first('total_point') }}</span>

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
                                  <a href="{{route('admin.customer.index')}}" class="btn btn-secondary form-control">Cancel</a>
                                 
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#expire_date').datetimepicker();
  });
  $(document).ready(function() {
    $('#issue_date').datetimepicker();
  });
  $(document).ready(function() {
    $('#birthday').datetimepicker();
  });
  var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
@endsection