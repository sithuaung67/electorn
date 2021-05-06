@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Support Center Edit')
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
            <a href="{{route('admin.support_center.index')}}" class="kt-subheader__breadcrumbs-link">Support Center </a>
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
                          <h3 class="kt-portlet__head-title">Support Center</h3>
                        </div>
                        <div class="kt-portlet__head-label">
                          <a href="{{route('admin.support_center.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                          </a>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.support_center.update',$support_center->id) }}" method="POST"  autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" style="height: auto;" aria-describedby="" placeholder="" value="{{$support_center->phone}}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" style="height: auto;" aria-describedby="" placeholder="" value="{{$support_center->type}}">
                            <span class="text-danger">{{ $errors->first('type') }}</span>

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
                                  <a href="{{route('admin.support_center.index')}}" class="btn btn-secondary form-control">Cancel
                                  </a>
                                 
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
 
@endsection