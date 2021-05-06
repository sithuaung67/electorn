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
@section('title','Hotel Image View')
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
                <a href="" class="kt-subheader__breadcrumbs-link">View </a>
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


            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="kt-portlet">
                   <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Hotel Image View</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.hotel.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>  
                    </div>
                    <div class="kt-portlet__body">
                      <div class="row">
                        @foreach($hotel_images as $image)
                          @if($image->hotel_id==$hotel->hotel_id) 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img id="image_four" src="{{$image->hotel_image}}" style="width: 100%;height: 220px;" />
                                    <a href="{{ route('admin.hotel.image.edit',$image->hotel_image_id) }}" class="btn btn-outline-primary btn-sm mt-1" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
                                    <form  action="{{ route('admin.hotel.image.destroy',$image->hotel_image_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
                                      @csrf
                                      @method('delete')                                      
                                      <button class="btn btn-outline-danger mt-1" style="margin-left: 10px;"><i class="kt-menu__link-icon flaticon-delete" style="margin: 0px -10px 0px -5px !important;"></i></button>
                                    </form> 
                                </div>
                            </div>
                          @endif
                      @endforeach
                      </div>
                  </div>
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
                          <h3 class="kt-portlet__head-title">Add Package Image</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.hotel.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
                    
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.hotel.image.store',$hotel->hotel_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                        <div class="row">
                        <div class="container">
                            <fieldset class="form-group">
                                <!-- <a href="javascript:void(0)" onclick="$('#hotel_image').click()">Upload Image</a> -->
                                <label>Upload (Allow Multiple / no select each image) <a href="javascript:void(0)" class="custom-file-container__image-clear" id="clear_image" title="Clear Image"> ClearImage</a></label>

                                <!-- <label>Upload Image</label>  -->
                                <input type="file" id="hotel_image" name="hotel_image[]" style="display: block;height: auto;" class="form-control" multiple>
                            </fieldset>
                            <div class="preview-images-zone form-group" id=preview></div>
                        </div>
                      
                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary form-control">Add</button>
                                 
                                </div>
                                
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <a href="{{route('admin.package.index')}}" class="btn btn-secondary form-control">Cancel</a>
                                 
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

    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
	}, 1500);

   	var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>

<script type="text/javascript">
  $(document).ready(function() {
    document.getElementById('hotel_image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        console.log('no');
        $(".preview-image.preview-show-"+no).remove();

        var $el = $('#hotel_image');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
    });

    $('#clear_image').on('click', function(e) {
        var $el = $('#hotel_image');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();

        let no = $('.image-cancel').data('no');
        console.log(no);
        $(".preview-image.preview-show-").remove();
      
   });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-">' +
                            '<div class="image-cancel" data-no="">x</div>' +
                            '<div class="image-zone"><img id="hotel_image" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        // $("#hotel_image").val('');
    } else {
        console.log('Browser not support');
    }
}


</script> 
@endsection