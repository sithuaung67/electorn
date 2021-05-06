@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Tour Leader Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Tour Leader </a>
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
                          <h3 class="kt-portlet__head-title">Tour Leader</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.tour_leader.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.tour_leader.update',$tour_leader->tour_leader_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Name</label> <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="" style="height: auto;" value="{{ $tour_leader->name}}" required="required">
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tour User Name</label> <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="tour_user_name" id="tour_user_name" aria-describedby="" placeholder="" style="height: auto;" value="{{ $tour_leader->tour_user_name}}" required="required">
                            <span class="text-danger">{{ $errors->first('tour_user_name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Password</label> <i class="fa fa-lock"></i>
                            <input type="text" class="form-control" name="password" id="password" aria-describedby="" placeholder="" style="height: auto;" value="{{ $tour_leader->password}}" required="required">
                            <span class="text-danger">{{ $errors->first('password') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Phone Number</label> <i class="fa fa-phone"></i>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" aria-describedby="" placeholder="" style="height: auto;" value="{{ $tour_leader->contact_phone}}" required="required">
                            <span class="text-danger">{{ $errors->first('contact_phone') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Image</label> <i class="fa fa-image  "></i>
                            <input type="file" class="form-control" name="image" id="image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('image') }}"  onchange="loadFile(event)">
                            <span class="text-danger">{{ $errors->first('image') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            @if($tour_leader->image)
                              <img id="image_one" src="../../../../uploads/customer/{{$tour_leader->image}}" width="100%" height="200" />
                            @else
                              <img id="image_one" src="{{asset('../../favicon.ico')}}" width="100%" height="200" />
                            @endif
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
                                <div class="form-leader">
                                  <a href="{{route('admin.tour_leader.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
        $('#tour_id').select2();
        $('#package_id').select2();
      });

      var loadFile = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
@endsection