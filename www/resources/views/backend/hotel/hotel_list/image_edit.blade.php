@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }

    .preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}

#image_four {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}
  </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection
@section('title','Hotel Image Edit')
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
               	<a href="" class="kt-subheader__breadcrumbs-link">Hotel Image </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">Edit </a>
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
                <div class="col-md-8">
                  <div class="kt-portlet">
                   <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Hotel Image Edit</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.hotel.image.view.index',$hotel_images->hotel_id)}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.hotel.image.update',$hotel_images->hotel_image_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
	                    <div class="kt-portlet__body">
	                    	<div class="row">
		                        <div class="col-md-12">
		                          <div class="form-group">
		                            <img id="image_one" src="{{$hotel_images->hotel_image}}" style="width: 100%;height: 300px;" />
		                          </div>
		                        </div>
		                    	<div class="col-md-12">
		                          <div class="form-group">
		                            <input type="file" class="form-control" name="hotel_image" id="hotel_image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('hotel_image') }}" onchange="loadFileOne(event)">
		                            <span class="text-danger">{{ $errors->first('hotel_image') }}</span>

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
		                                  <a href="{{route('admin.hotel.image.view.index',$hotel_images->hotel_id)}}" class="btn btn-secondary form-control">Cancel</a>
		                                 
		                                </div>
		                                
		                              </div>
		                          </div>
                        		</div>
	                    	</div>
	                	</div>
	                </form>
                  </div>
                </div>      
              </div>
            </div>
        </div>   
 
@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(document).ready(function() {
    $('#start_date').datetimepicker();
    $('#end_date').datetimepicker();
    $('#itinerary_mm').summernote({
            height: 200, 
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
            fontNamesIgnoreCheck: ['Poppins']
    });
    $('#itinerary_en').summernote({
            height: 200, 
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
            fontNamesIgnoreCheck: ['Poppins']
    });

  });

   	var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

  setTimeout(function() {
    $('#successMessage').fadeOut('fast');
  }, 1500);
  </script>


@endsection