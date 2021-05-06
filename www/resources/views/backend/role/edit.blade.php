@extends('backend.layouts.master')

@section('css')
  
@endsection
@section('title','Role')
@section('content')
  
  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
                  <a href="{{ route('admin.dashboard') }}">
                    
                  <h3 class="kt-subheader__title">Dashboard</h3>
                  </a>
                  <span class="kt-subheader__separator kt-hidden"></span>
                  <div class="kt-subheader__breadcrumbs">
                   
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route('admin.roles.index') }}" class="kt-subheader__breadcrumbs-link">
                      Role </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                      edit </a>
                   
                  </div>
        </div>
      </div>
    </div>

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Role Permission</h3>
                      </div>
                      <div class="kt-portlet__head-label">
                         <a href="{{route('admin.roles.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
                      </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.roles.update',$role->id) }}" method="POST"  autocomplete="off" >
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                          
                            <div class="col-md-12">
                              <div class="form-group ">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}" aria-describedby="" placeholder="">
                                <span class="text-danger">{{ $errors->first('name') }}</span>

                              </div>
                            </div>
                                           
                        <div class="col-md-12">
                            <div class="form-group">
                              <strong>Admin Permissions:</strong><br/><br>
                               <span class="text-danger">{{ $errors->first('permission') }}</span>
                                @foreach ($permission->chunk(4) as $key=>$chunk)
                                    @if( ($loop->index == 0) || ($loop->index == 1) || ($loop->index == 2) || ($loop->index == 3) || ($loop->index == 4) || ($loop->index == 5) || ($loop->index == 6))</span>
                                      <div class="row">
                                          @foreach ($chunk as $value)
                                          <br> 
                                          <div class="col-md-3">
                                              
                                              <label name="name">
                                                {{ Form::checkbox('permission[]', $value->id,in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->name }}
                                              </label>
                                          </div>   
                                              
                                          @endforeach
                                      </div>
                                    @endif
                                @endforeach
                                   <hr>

                                 <strong>Other Permissions:</strong><br><br>
                                
                                @foreach ($permission->chunk(4) as $key=>$chunk)
                                    @if( ($loop->index == 0) || ($loop->index == 1) || ($loop->index == 2) || ($loop->index == 3) || ($loop->index == 4) || ($loop->index == 5) || ($loop->index == 6))

                                    @else
                                    <div class="row">
                                        @foreach ($chunk as $value)
                                        <br> 
                                        <div class="col-md-3">
                                            
                                            <label name="name">
                                              
                                              {{ Form::checkbox('permission[]', $value->id,in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                              {{ $value->name }}
                                            </label>
                                        </div>   
                                            
                                        @endforeach
                                    </div>
                                    @endif
                                    
                                @endforeach

                              

                               
                            </div>
    
                        </div>
                  
                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success form-control">Update</button>
                                 
                                </div>
                                
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <a href="{{route('admin.roles.index')}}" class="btn btn-secondary form-control">Cancel</a>
                                 
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