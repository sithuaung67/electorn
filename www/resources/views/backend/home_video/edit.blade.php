@extends('backend.layouts.master')

@section('css')
  
@endsection
@section('title','Home Video Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Home Vido</a>
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
                          <h3 class="kt-portlet__head-title">Home Video</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.home_video.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.home_video.update',$home_video->home_video_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" style="height: auto;" aria-describedby="" placeholder="" value="{{$home_video->name}}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Cover</label>
                            <input type="file" class="form-control" name="home_cover" style="height: auto;" aria-describedby="" placeholder="" value="{{$home_video->home_cover}}" onchange="loadFilePhoto(event)">
                            <span class="text-danger">{{ $errors->first('home_cover') }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Video</label>
                            <input type="file" class="form-control" name="video" style="height: auto;" aria-describedby="" placeholder="" value="{{$home_video->video}}" onchange="loadFileVideo(event)">
                            <span class="text-danger">{{ $errors->first('video') }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <img id="tutorial_photo" src="../../../../uploads/home_cover/{{$home_video->home_cover}}" width="100%" height="200" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <video style="width: 100%;" src="../../../../uploads/home_video/{{$home_video->video}}" controls="controls" id="tutorial_video"></video>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success form-control">Update</button>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <a href="{{route('admin.home_video.index')}}" class="btn btn-secondary form-control">Cancel</a>
                                 
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
      var loadFilePhoto = function(event) {
      var image = document.getElementById('tutorial_photo');
      image.src = URL.createObjectURL(event.target.files[0]);
      };
      var loadFileVideo = function(event) {
      var video = document.getElementById('tutorial_video');
      video.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
@endsection