@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Destination Edit')
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
            <a href="" class="kt-subheader__breadcrumbs-link">Destination </a>
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
                          <h3 class="kt-portlet__head-title">Destination</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.destination.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.destination.update',$destination->destination_id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="destination_name" id="destination_name" aria-describedby="" placeholder="" style="height: auto;" value="{{ $destination->destination_name }}">
                            <span class="text-danger">{{ $errors->first('destination_name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Country</label> <i class="fa fa-flag"></i>
                            <select class="form-control" name="country_id" id="country_id" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('country_id') }}" required="required">
                              <option value="{{$destination->country_id}}">
                                @foreach($countries as $country)
                                  @if($country->country_id==$destination->country_id)
                                    {{$country->country_name}}
                                  @endif
                                @endforeach
                              </option>
                              @foreach($countries as $country_id)
                                <option value="{{$country_id->country_id}}">{{$country_id->country_name}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="destination_image" id="destination_image" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('destination_image') }}" onchange="loadFileOne(event)">
                            <span class="text-danger">{{ $errors->first('destination_image') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Popular</label>
                            <select class="form-control" name="popular" id="popular" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('popular') }}" required="required">
                              @if($destination->popular=="0")
                                <option value="1">Yes</option>
                                <option value="0" selected="selected">No</option>
                              @else
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                              @endif
                            </select>
                            <span class="text-danger">{{ $errors->first('popular') }}</span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <img id="image_one" src="../../../../uploads/destination/{{$destination->destination_image}}" width="100%" height="200" />
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
                                  <a href="{{route('admin.destination.index')}}" class="btn btn-secondary form-control">Cancel</a>
                                 
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
        $('#popular').select2();
        $('#country_id').select2();
       });
    </script>
<script type="text/javascript">
  var loadFileOne = function(event) {
      var image = document.getElementById('image_one');
      image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection