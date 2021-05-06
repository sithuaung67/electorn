@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
<style type="text/css">
	#question th{
		color: black;
	}
	#question td{
		color: black;
	}
	.kt-container{
      	color: black;
    }
</style>

@endsection

@section('title','Notification View')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-3">
            <a href="{{route('admin.notification.index')}}" class="btn btn-sm btn-outline-primary">
            	<i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Notification</li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
	                <div class="kt-portlet__head-label">
	                   <h5><strong>{{$notification->title}}</strong></h5>
	                </div>
	            </div>
	            <div class="kt-portlet__head">
	            	<div class="kt-portlet__head-label mb-4 mt-4 col-md-6 offset-3">
	                    @if($notification->image)
	                   		<img src="../../../../uploads/notification/{{$notification->image}}" class="rounded" style="width: 100%;height: 100%;">
	                    @else
	                   		<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 100%;height: 100%;">
	                    @endif
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					{!! $notification->message !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
  
 <script>
 	$(document).ready(function() {
  
    var table = $('#question').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
