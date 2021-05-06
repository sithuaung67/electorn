@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Join Table Create')
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
                      Join Table </a>
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
                          <h3 class="kt-portlet__head-title">Join Table</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.join_table.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
              
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.join_table.store') }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Package</label> <i class="fa fa-shopping-cart"></i>
                            <select class="form-control" name="package_id" id="package_id" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('package_id') }}" required="required">
                              @foreach($packages as $package)
                                <option value="{{$package->package_id}}">{{$package->package_name_mm}}({{$package->tour_code}})</option>
                              @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('package_id') }}</span>

                          </div>
                        </div>
                      
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Destination</label> <i class="fa fa-flag"></i>
                            <select class="form-control" name="destination_id" id="destination_id" aria-describedby="" placeholder="" style="height: auto;" value="{{ old('destination_id') }}" required="required">
                              @foreach($destinations as $destination)
                                <option value="{{$destination->destination_id}}">{{$destination->destination_name}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('destination_id') }}</span>

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
                                <div class="form-leader">
                                  <a href="{{route('admin.join_table.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
        $('#package_id').select2();
        $('#country_id').select2();
        $('#destination_id').select2();
      });
    </script>

@endsection