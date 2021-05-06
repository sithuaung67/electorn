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

@section('title','Question View')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-3">
            <a href="{{route('admin.ask_question.index')}}" class="btn btn-sm btn-outline-primary">
            	<i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Question</li>
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
	                   <h4><i class="badge badge-primary" style="height: 20px;">Question</i></h4>&nbsp;
	                   <h5>{{$question->question_en}}</h5>
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					<h4><i class="badge badge-primary" style="height: 20px;">Answer</i></h4>{{ $question->answer_en }}
				</div>
			</div>
		</div>
	</div>
	@if(!empty($question->question_mm) && !empty($question->answer_mm))
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
	                <div class="kt-portlet__head-label">
	                	<h4><i class="badge badge-primary" style="height: 20px;">Question</i></h4>&nbsp;
	                  	<h5>{{$question->question_mm}}</h5>
	                </div>
	            </div>
				<div class="kt-portlet__body">
					<h4><i class="badge badge-primary" style="height: 20px;">Answer</i></h4>
					{{ $question->answer_mm }}
				</div>
			</div>
		</div>
	</div>
	@endif
@endsection

@section('script')
  
 <script>
 	$(document).ready(function() {
  
    var table = $('#question').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
