@extends('backend.layouts.master')

@section('css')
  
@endsection
@section('title','Popup Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Popup</a>
              <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link">edit </a>
          </div>
        </div>
      </div>
    </div>

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row justify-content-center">
                <div class="col-md-9">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Popup</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.popup.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.popup.update',$popup->popup_id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('status') }}">
                              <option value="1">Allow</option>
                              <option value="0">Deny</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body" aria-describedby="" placeholder="" style="height: 150px;" value="{{ old('body') }}">{{$popup->body}}</textarea>
                            <span class="text-danger">{{ $errors->first('body') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" id="image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('image') }}" onchange="loadFileOne(event)">
                            <span class="text-danger">{{ $errors->first('image') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <img id="image_one" src="../../../../uploads/popup/{{$popup->image}}" width="100%" height="200" />
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-info form-control">Update</button>
                                 
                                </div>
                                
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <a href="{{route('admin.popup.index')}}" class="btn btn-secondary form-control">
                                    Cancel
                                  </a>                                 
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
    $('#status').select2();
  });

var loadFileOne = function(event) {
var image = document.getElementById('image_one');
image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
@endsection