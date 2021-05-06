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

    .container {
        padding-top: 50px;
    }
  </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection
@section('title','Package Create')
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
                      Package </a>
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
                <div class="col-md-10">
                  <div class="kt-portlet">
                   <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <h3 class="kt-portlet__head-title">Package</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.package.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
              
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.package.store') }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Name Myanmar</label>
                            <input type="text" class="form-control" name="package_name_mm" id="package_name_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('package_name_mm') }}" required="required">
                            <span class="text-danger">{{ $errors->first('package_name_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Name English</label>
                            <input type="text" class="form-control" name="package_name_en" id="package_name_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('package_name_en') }}" required="required">
                            <span class="text-danger">{{ $errors->first('package_name_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control" name="start_date" id="start_date" aria-describedby="" placeholder="dd-mm-yyyy" style="height: auto;" value="{{ old('start_date') }}" required="required">
                            <span class="text-danger">{{ $errors->first('start_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control" name="end_date" id="end_date" aria-describedby="" placeholder="dd-mm-yyyy" style="height: auto;" value="{{ old('end_date') }}" required="required">
                            <span class="text-danger">{{ $errors->first('end_date') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Duration Myanmar</label>
                            <input type="text" class="form-control" name="duration_mm" id="duration_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('duration_mm') }}" required="required">
                            <span class="text-danger">{{ $errors->first('duration_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Duration English</label>
                            <input type="text" class="form-control" name="duration_en" id="duration_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('duration_en') }}" required="required">
                            <span class="text-danger">{{ $errors->first('duration_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Location Myanmar</label>
                            <input type="text" class="form-control" name="location_mm" id="location_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('location_mm') }}" required="required">
                            <span class="text-danger">{{ $errors->first('location_mm') }}</span>

                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label>Location English</label>
                            <input type="text" class="form-control" name="location_en" id="location_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('location_en') }}" required="required">
                            <span class="text-danger">{{ $errors->first('location_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Direction Myanmar</label>
                            <input type="text" class="form-control" name="direction_mm" id="direction_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('direction_mm') }}" required="required">
                            <span class="text-danger">{{ $errors->first('direction_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Direction English</label>
                            <input type="text" class="form-control" name="direction_en" id="direction_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('direction_en') }}" required="required">
                            <span class="text-danger">{{ $errors->first('direction_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Twin Share Room Price</label>
                            <input type="number" class="form-control" name="twin_share_room_price" id="twin_share_room_price" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('twin_share_room_price') }}" required="required">
                            <span class="text-danger">{{ $errors->first('twin_share_room_price') }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Single Room Price</label>
                            <input type="number" class="form-control" name="single_room_price" id="single_room_price" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('single_room_price') }}" required="required">
                            <span class="text-danger">{{ $errors->first('single_room_price') }}</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Extra Bed Price</label>
                            <input type="number" class="form-control" name="extra_bed_price" id="extra_bed_price" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_bed_price') }}" required="required">
                            <span class="text-danger">{{ $errors->first('extra_bed_price') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Without Extra Bed Price</label>
                            <input type="number" class="form-control" name="without_extra_bed_price" id="without_extra_bed_price" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('without_extra_bed_price') }}" required="required">
                            <span class="text-danger">{{ $errors->first('without_extra_bed_price') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Discount Price</label>
                            <input type="number" class="form-control" name="discount_price" id="discount_price" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('discount_price') }}" required="required">
                            <span class="text-danger">{{ $errors->first('discount_price') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tour Code</label>
                            <input type="text" class="form-control" name="tour_code" id="tour_code" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('tour_code') }}" required="required">
                            <span class="text-danger">{{ $errors->first('pin') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Pin</label>
                            <select class="form-control" name="pin" id="pin" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('pin') }}" required="required">
                              <option value="">Choose Pin</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('pin') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description Myanmar</label>
                            <textarea class="form-control" name="description_mm" id="description_mm" aria-describedby="" placeholder="" style="height: 150px;" value="{{ old('description_mm') }}" required="required"></textarea>
                            <span class="text-danger">{{ $errors->first('description_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description English</label>
                            <textarea class="form-control" name="description_en" id="description_en" aria-describedby="" placeholder="" style="height: 150px;" value="{{ old('description_en') }}" required="required"></textarea>
                            <span class="text-danger">{{ $errors->first('description_en') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Itinerary Myanmar</label>
                            <textarea class="form-control" name="itinerary_mm" id="itinerary_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('itinerary_mm') }}" required="required"></textarea>
                            <span class="text-danger">{{ $errors->first('itinerary_mm') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Itinerary English</label>
                            <textarea class="form-control" name="itinerary_en" id="itinerary_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('itinerary_en') }}" required="required"></textarea>
                            <span class="text-danger">{{ $errors->first('itinerary_en') }}</span>

                          </div>
                        </div>

                        <div class="container">
                          <fieldset class="form-group">
                          <!-- <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a> -->
                            <label>Upload (Allow Multiple / no select each image) <a href="javascript:void(0)" class="custom-file-container__image-clear" id="clear_image" title="Clear Image"> ClearImage (all clear and no allow one clear)</a></label>
                            <!-- <label>Upload Image</label>  -->
                            <input type="file" id="pro-image" name="pro-image[]" style="display: block;height: auto;" class="form-control" multiple>
                          </fieldset>
                          <div class="preview-images-zone form-group" id=preview></div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Portrait Image</label>
                            <input type="file" class="form-control" name="portrait_image" id="portrait_image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('portrait_image') }}" onchange="loadFileOne(event)">
                            <span class="text-danger">{{ $errors->first('portrait_image') }}</span>

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
    $('#pin').select2();
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

  </script>

<script type="text/javascript">
  $(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        console.log('no');
        $(".preview-image.preview-show-"+no).remove();

        var $el = $('#pro-image');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
    });

    $('#clear_image').on('click', function(e) {
        var $el = $('#pro-image');
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
                            '<div class="image-zone"><img id="pro-img-" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        // $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}


var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

</script> 
<script>
$(document).ready(function(){
    $("img").addClass("img-responsive");
    $("img").css("max-width", "100%");
});
</script>
@endsection