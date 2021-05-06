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
@section('title','Room View Create')
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
          <a href="" class="kt-subheader__breadcrumbs-link">Room</a>
          <span class="kt-subheader__breadcrumbs-separator"></span>
          <a href="" class="kt-subheader__breadcrumbs-link">Create </a>
        </div>
      </div>
    </div>
  </div>
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row justify-content-center">
      <form class="kt-form" action="{{ route('admin.hotel.view.store',$id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="kt-portlet">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">Room Create</h3>
                </div>
                <div class="kt-portlet__head-label">
                  <a href="{{route('admin.hotel_view.index',$id)}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
                </div>
              </div>
              <div class="kt-portlet__body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Type</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="room_type" id="room_type" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_type') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_type') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room View</label>
                      <input type="text" class="form-control" name="room_view" id="room_view" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_view') }}">
                      <span class="text-danger">{{ $errors->first('room_view') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Qty</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_qty" id="room_qty" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_qty') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_qty') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Qty</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_qty" id="extra_qty" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_qty') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_qty') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid From One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_from_one" id="valid_from_one" aria-describedby="" style="height: auto;" placeholder="dd-mm-yy" value="{{ old('valid_from_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_from_one') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid To One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_to_one" id="valid_to_one" aria-describedby="" placeholder="dd-mm-yy" style="height: auto;" value="{{ old('valid_to_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_to_one') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Local One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_local_one" id="room_price_local_one" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_local_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_local_one') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Foreign One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_foreign_one" id="room_price_foreign_one" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_foreign_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_foreign_one') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Local One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_local_one" id="extra_price_local_one" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_local_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_local_one') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Foreign One</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_foreign_one" id="extra_price_foreign_one" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_foreign_one') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_foreign_one') }}</span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid From Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_from_two" id="valid_from_two" aria-describedby="" style="height: auto;" placeholder="dd-mm-yy" value="{{ old('valid_from_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_from_two') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid To Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_to_two" id="valid_to_two" aria-describedby="" placeholder="dd-mm-yy" style="height: auto;" value="{{ old('valid_to_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_to_two') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Local Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_local_two" id="room_price_local_two" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_local_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_local_two') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Foreign Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_foreign_two" id="room_price_foreign_two" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_foreign_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_foreign_two') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Local Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_local_two" id="extra_price_local_two" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_local_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_local_two') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Foreign Two</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_foreign_two" id="extra_price_foreign_two" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_foreign_two') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_foreign_two') }}</span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid From Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_from_three" id="valid_from_three" aria-describedby="" style="height: auto;" placeholder="dd-mm-yy" value="{{ old('valid_from_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_from_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Valid To Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="text" class="form-control" name="valid_to_three" id="valid_to_three" aria-describedby="" placeholder="dd-mm-yy" style="height: auto;" value="{{ old('valid_to_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('valid_to_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Local Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_local_three" id="room_price_local_three" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_local_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_local_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Price Foreign Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="room_price_foreign_three" id="room_price_foreign_three" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_price_foreign_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('room_price_foreign_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Local Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_local_three" id="extra_price_local_three" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_local_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_local_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Extra Price Foreign Three</label> <span style="color: #CD1717;font-weight:700;">*</span>
                      <input type="number" class="form-control" name="extra_price_foreign_three" id="extra_price_foreign_three" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('extra_price_foreign_three') }}" required="required">
                      <span class="text-danger">{{ $errors->first('extra_price_foreign_three') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Room Image</label>
                      <input type="file" class="form-control" name="room_img" id="room_img" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('room_img') }}" onchange="loadFileOne(event)">
                      <span class="text-danger">{{ $errors->first('room_img') }}</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <img id="image_one" width="100%" height="200" />
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
                          <a href="{{route('admin.hotel_view.index',$id)}}" class="btn btn-secondary form-control">Cancel</a>
                        </div>
                      </div>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#valid_from_one').datetimepicker();
    $('#valid_to_one').datetimepicker();
    $('#valid_from_two').datetimepicker();
    $('#valid_to_two').datetimepicker();
    $('#valid_from_three').datetimepicker();
    $('#valid_to_three').datetimepicker();
});

</script>
<script type="text/javascript">
  var loadFileOne = function(event) {
    var image = document.getElementById('image_one');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection