@extends('backend.layouts.master')

@section('css')
  <style type="text/css">
    
    .kt-container{
      color: black;
    }
  </style>
@endsection
@section('title','Member Account Edit')
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
                <a href="{{route('admin.users.index')}}" class="kt-subheader__breadcrumbs-link">
                  Admin Account </a>
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
                <div class="col-md-10">
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Member Account</h3>
                      </div>
                      <div class="kt-portlet__head-label">
                         <a href="{{route('admin.users.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
                      </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('admin.users.update',$user->id) }}" method="POST"  autocomplete="off" >
                      @csrf
                      @method('post')
                      <div class="kt-portlet__body">
                                              
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="" value="{{ $user->name }}" placeholder="">
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email  </label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" aria-describedby="" placeholder="">
                            <span class="text-danger">{{ $errors->first('email') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" aria-describedby="" placeholder="new-password or already-password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>

                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="confirm-password" autocomplete="new-password" placeholder="">

                          </div>
                        </div>
                         <div class="col-md-12">
                          <div class="form-group">
                            <label>Role</label>
                            
                              {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','id'=>'users')) !!}
                            
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
                                   <a href="{{route('admin.users.index')}}" class="btn btn-secondary form-control">Cancel</a>
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
        $('#users').select2();
       });
    </script>

@endsection