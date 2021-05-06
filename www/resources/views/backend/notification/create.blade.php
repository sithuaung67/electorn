@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Notification Create')
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
                    <a href="" class="kt-subheader__breadcrumbs-link">
                      Notification </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                      create </a>
                   
                  </div>
        </div>
      </div>
    </div>

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="kt-portlet">
                   <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Notification</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.notification.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
              
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.notification.store') }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Type</label>
                              <select class="form-control" name="all" id="all" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('all') }}">
                                <option value="1">All</option>
                              </select>
                              <span class="text-danger">{{ $errors->first('all') }}</span>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Title</label>
                              <input type="text" class="form-control" name="title" id="title" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('title') }}" required="required">
                              <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Message</label>
                              <textarea class="form-control" name="message" id="message" aria-describedby="" placeholder="" style="height: 200px;" value="{{ old('message') }}" required="required"></textarea>
                              <span class="text-danger">{{ $errors->first('message') }}</span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Image</label>
                              <input type="file" class="form-control" name="image" id="image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('image') }}" onchange="loadFileOne(event)">
                              <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <img id="image_one" width="100%" height="200" />
                            </div>
                          </div>
                          <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Create</button> 
                                  </div>                                
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <a href="{{route('admin.notification.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
  <script src="{{ asset('js/select2.js') }}"></script>
    <script>
      $(document).ready(function() {
        $('#all').select2();
      });
      var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>

@endsection