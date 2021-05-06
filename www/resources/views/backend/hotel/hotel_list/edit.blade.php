@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
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

</style>
@endsection
@section('title','Hotel Edit')
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
          <a href="" class="kt-subheader__breadcrumbs-link">Hotel</a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">Edit </a>
        </div>
      </div>
    </div>
  </div>
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row justify-content-center">
      <form class="kt-form" action="{{ route('admin.hotel.update',$hotel->hotel_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="kt-portlet">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label"><h3 class="kt-portlet__head-title">HOTEL GENERAL</h3></div>
                <div class="kt-portlet__head-label">
                  <a href="{{route('admin.hotel.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
                </div>
              </div>
              <div class="kt-portlet__body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Hotel Name</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="hotel_name" id="hotel_name" aria-describedby="" placeholder="" style="height: auto;" value="{{ $hotel->hotel_name }}" required="required">
                      <span class="text-danger">{{ $errors->first('hotel_name') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address Myanmar</label>
                      <textarea class="form-control" name="address_mm" id="address_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('address_mm') }}">{!! $hotel->address_mm !!}</textarea>
                      <span class="text-danger">{{ $errors->first('address_mm') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address English</label>
                      <textarea class="form-control" name="address_en" id="address_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('address_en') }}">{!! $hotel->address_en !!}</textarea>
                      <span class="text-danger">{{ $errors->first('address_en') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Contact Information Myanmar</label>
                      <textarea class="form-control" name="contact_info_mm" id="contact_info_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('contact_info_mm') }}">{{$hotel->contact_info_mm}}</textarea>
                      <span class="text-danger">{{ $errors->first('contact_info_mm') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Contact Information English</label>
                      <textarea class="form-control" name="contact_info_en" id="contact_info_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('contact_info_en') }}">{{$hotel->contact_info_en}}</textarea>
                      <span class="text-danger">{{ $errors->first('contact_info_en') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Policy Myanmar</label>
                      <textarea class="form-control" name="policy_mm" id="policy_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('policy_mm') }}">{{$hotel->policy_mm}}</textarea>
                      <span class="text-danger">{{ $errors->first('policy_mm') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Policy English</label>
                      <textarea class="form-control" name="policy_en" id="policy_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('policy_en') }}">{{$hotel->policy_en}}</textarea>
                      <span class="text-danger">{{ $errors->first('policy_en') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Note Myanmar</label>
                      <textarea class="form-control" name="note_mm" id="note_mm" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('note_mm') }}">{{$hotel->note_mm}}</textarea>
                      <span class="text-danger">{{ $errors->first('note_mm') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Note English</label>
                      <textarea class="form-control" name="note_en" id="note_en" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('note_en') }}">{{$hotel->note_en}}</textarea>
                      <span class="text-danger">{{ $errors->first('note_en') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary form-control">Create</button>     
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <a href="{{route('admin.hotel.index')}}" class="btn btn-secondary form-control">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="kt-portlet">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label"><h3 class="kt-portlet__head-title">HOTEL MAIN SETTINGS</h3></div>
              </div>
              <div class="kt-portlet__body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" class="form-control" name="country_name" id="country_name" aria-describedby="" placeholder="" style="height: auto;" value="{{ "Myanmar" }}" required="required">
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Region/State</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <select class="form-control" name="state_id" id="state_id" aria-describedby="" placeholder="" style="height: auto;" required="required">
                        <option value="{{$hotel->state_id}}">{{$hotel->state_name}}</option>
                      </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>City</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <select class="form-control" name="city_id" id="city_id" aria-describedby="" placeholder="" style="height: auto;" required="required">
                        <option value="{{$hotel->city_id}}">{{$hotel->township}}</option>
                      </select>
                      <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Hotel Rating</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="hotel_rating" id="hotel_rating" aria-describedby="" placeholder="" style="height: auto;" value="{{ $hotel->hotel_rating}}" required="required">
                      <span class="text-danger">{{ $errors->first('hotel_rating') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Price Type</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <select class="form-control" name="price_type" id="price_type" aria-describedby="" style="height: auto;" placeholder="dd-mm-yy" value="{{ old('price_type') }}" required="required">
                        @if($hotel->price_type==0)
                          <option value="0">Local</option>
                          <option value="1">Foreign</option>
                          <option value="2">Local and Foreign</option>
                        @elseif($hotel->price_type==1)
                          <option value="1">Foreign</option>
                          <option value="0">Local</option>
                          <option value="2">Local and Foreign</option>
                        @else
                          <option value="2">Local and Foreign</option>
                          <option value="0">Local</option>
                          <option value="1">Foreign</option>
                        @endif
                      </select>
                      <span class="text-danger">{{ $errors->first('price_type') }}</span>
                    </div>
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
 
@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(document).ready(function() {
    $('#state_id').select2();
    $('#city_id').select2();
    $('#price_type').select2();
    $('#valid_from').datetimepicker();
    $('#valid_to').datetimepicker();
    $('#address_mm').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#address_en').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#contact_info_mm').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#contact_info_en').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#policy_mm').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#policy_en').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#note_mm').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
    $('#note_en').summernote({
      height: 200, 
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','Poppins'],
      fontNamesIgnoreCheck: ['Poppins']
    });
  });

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
                            '<div class="image-zone"><img id="hotel_image-" src="' + picFile.result + '"></div>' +
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