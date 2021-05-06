@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Tour Group Create')
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
                      Tour Group </a>
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
                          <h3 class="kt-portlet__head-title">Tour Group</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.tour_group.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>
              
                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.tour_group.store') }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="kt-portlet__body">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label>Tour Leader</label>
                            <select class="form-control" name="tour_leader_id" id="tour_leader_id" aria-describedby="" placeholder="" style="height: auto;">
                              <option value="">Choose Tour Leader</option>
                              @foreach($tour_leader as $tour)
                                <option value="{{$tour->tour_leader_id}}">{{$tour->name}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tour_leader_id') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Package</label>
                            <select class="form-control" name="package_id" id="package_id" aria-describedby="" placeholder="" style="height: auto;">
                              <option value="">Choose Packages</option>
                              @foreach($packages as $package)
                                <option value="{{$package->package_id}}">{{$package->package_name_mm}}({{$package->tour_code}})</option>
                              @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('package_id') }}</span>

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
                                  <a href="{{route('admin.tour_group.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
        $('#tour_leader_id').select2();
        $('#package_id').select2();
      });
    </script>

@endsection