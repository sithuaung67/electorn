@extends('backend.layouts.master')

@section('css')
  
@endsection
@section('title','Role')
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
                      Roles</a>
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
                    <form class="kt-form" action="{{ route('admin.roles.store') }}" method="POST"  autocomplete="off" >
                      @csrf
                      <div class="kt-portlet__body">
                          
                            <div class="col-md-12">
                              <div class="form-group ">
                                <label>Role Name</label>
                                <input type="text" class="form-control" name="name" aria-describedby="" placeholder="" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>

                              </div>
                            </div>
                                           
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Admin Permissions:</strong>

                                <label name="name" style="margin-left: 10px;">
                                
                                 <input type="checkbox" id="checkall1">&nbsp;Select All<br>
                               </label>
                                <span class="text-danger">{{ $errors->first('permission') }}</span>
                                
                                @foreach ($permission->chunk(4) as $key=>$chunk)
                                    @if( ($loop->index == 0) || ($loop->index == 1) || ($loop->index == 2) || ($loop->index == 3) || ($loop->index == 4) || ($loop->index == 5) || ($loop->index == 6))</span>
                                      <div class="row">
                                          @foreach ($chunk as $value)
                                          <br> 
                                          <div class="col-md-3">
                                              
                                              <label name="name">
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="checkbox1">
                                                {{ $value->name }}
                                              </label>
                                          </div>   
                                              
                                          @endforeach
                                      </div>
                                    @endif
                                @endforeach
                                <hr>
                                 <strong>Other Permissions:</strong>
                                <label name="name" class="checkbox" style="margin-left: 10px;">
                                
                                 <input type="checkbox" id="checkall2">&nbsp;Select All<br>
                               </label>

                                <span class="text-danger">{{ $errors->first('permission') }}</span>
                                
                                @foreach ($permission->chunk(4) as $key=>$chunk)
                                    @if( ($loop->index == 0) || ($loop->index == 1) || ($loop->index == 2) || ($loop->index == 3) || ($loop->index == 4) || ($loop->index == 5) || ($loop->index == 6))

                                    @else
                                      <div class="row">
                                          @foreach ($chunk as $value)
                                          <br> 
                                          <div class="col-md-3">
                                            <label name="name" class="checkbox">
                                              <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="checkbox2">
                                              
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
                                  <button type="submit" class="btn btn-success form-control">Create</button>
                                 
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
  <script type='text/javascript'>
     $(document).ready(function(){
       // Check or Uncheck All checkboxes
       $("#checkall1").change(function(){
         var checked = $(this).is(':checked');
         if(checked){
           $(".checkbox1").each(function(){
             $(this).prop("checked",true);
           });
         }else{
           $(".checkbox1").each(function(){
             $(this).prop("checked",false);
           });
         }
       });
     
      // Changing state of CheckAll checkbox 
      $(".checkbox1").click(function(){
     
        if($(".checkbox1").length == $(".checkbox1:checked").length) {
          $("#checkall1").prop("checked", true);
        } else {
          $("#checkall1").removeAttr("checked");
        }

      });
    });
</script>
<script type='text/javascript'>
     $(document).ready(function(){
       // Check or Uncheck All checkboxes
       $("#checkall2").change(function(){
         var checked = $(this).is(':checked');
         if(checked){
           $(".checkbox2").each(function(){
             $(this).prop("checked",true);
           });
         }else{
           $(".checkbox2").each(function(){
             $(this).prop("checked",false);
           });
         }
       });
     
      // Changing state of CheckAll checkbox 
      $(".checkbox2").click(function(){
     
        if($(".checkbox2").length == $(".checkbox2:checked").length) {
          $("#checkall2").prop("checked", true);
        } else {
          $("#checkall2").removeAttr("checked");
        }

      });
    });
</script>
 
@endsection