@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#about th{
			color: black;
		}
		#about td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','About View')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-3">
            <a href="{{route('admin.about.index')}}" class="btn btn-sm btn-outline-primary">
            	<i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">About</li>
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
	                   <h4>About English</h4>
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					<h5>{!! $abouts->about_en !!}</h5>
				</div>
			</div>
		</div>
	</div>
	@if(!empty($abouts->about_en) && !empty($abouts->about_mm))
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
	                <div class="kt-portlet__head-label">
	                   <h4>About Myanmar</h4>
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					<h5>{!! $abouts->about_mm !!}</h5>
				</div>
			</div>
		</div>
	</div>
	@endif
@endsection

@section('script')
  
 <script>
 	$(document).ready(function() {
  
    var table = $('#about').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
