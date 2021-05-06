@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Travel Blog Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Travel Blog </a>
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
                          <h3 class="kt-portlet__head-title">Travel Blog</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.travel_blog.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.travel_blog.update',$travel_blog->travel_blog_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Blog Name Myanmar</label> <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="travel_blog_name_mm" id="travel_blog_name_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ $travel_blog->travel_blog_name_mm}}">
                            <span class="text-danger">{{ $errors->first('travel_blog_name_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Blog Name English</label> <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="travel_blog_name_en" id="travel_blog_name_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ $travel_blog->travel_blog_name_en}}">
                            <span class="text-danger">{{ $errors->first('travel_blog_name_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description Myanmar</label> <i class="fa fa-lock"></i>
                            <textarea class="form-control" name="description_mm" id="description_mm" aria-describedby="" placeholder="" style="height: auto;">{{$travel_blog->description_mm}}</textarea>
                            <span class="text-danger">{{ $errors->first('description_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description Englsih</label> <i class="fa fa-lock"></i>
                            <textarea class="form-control" name="description_en" id="description_en" aria-describedby="" placeholder="" style="height: auto;">{{$travel_blog->description_en}}</textarea>
                            <span class="text-danger">{{ $errors->first('description_en') }}</span>

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
                            @if($travel_blog->image)
                              <img id="image_one" src="../../../../uploads/travel_blog/{{$travel_blog->image}}" width="100%" height="200" />
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
                                  <a href="{{route('admin.travel_blog.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
        $('#description_mm').summernote({
            height: 200, 
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
            fontNamesIgnoreCheck: ['Poppins']
        });
        $('#description_en').summernote({
            height: 200, 
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
            fontNamesIgnoreCheck: ['Poppins']
        });
      });
      $('#destination_id').select2();

      var loadFile = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>
@endsection