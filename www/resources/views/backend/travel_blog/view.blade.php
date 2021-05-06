@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#travel_blog th{
			color: black;
		}
		#travel_blog td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','Travel Blog View')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-3">
            <a href="{{route('admin.travel_blog.index')}}" class="btn btn-sm btn-outline-primary">
            	<i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Travel Blog</li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="flash-message" id="successMessage">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
      @endforeach
    </div>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
	                <div class="kt-portlet__head-label">
	                   <h4><strong>{{$travel_blog->travel_blog_name_mm}}</strong></h4>
	                </div>
	            </div>
	            <div class="kt-portlet__head">
	            	<div class="kt-portlet__head-label mb-4 mt-4">
	                   <img src="../../../../uploads/travel_blog/{{$travel_blog->image}}" class="rounded" style="width: 100%;height: auto;">
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					{!! $travel_blog->description_mm !!}
				</div>
			</div>
		</div>
	</div>
	@if(!empty($travel_blog->travel_blog_name_en) && !empty($travel_blog->description_en))
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
	                <div class="kt-portlet__head-label">
	                   <h4><strong>{{$travel_blog->travel_blog_name_en}}</strong></h4>
	                </div>
	            </div>
	            <div class="kt-portlet__head">
	            	<div class="kt-portlet__head-label mb-4 mt-4">
	                   <img src="../../../../uploads/travel_blog/{{$travel_blog->image}}" class="rounded" style="width: 100%;height: auto;">
	                </div>
	            </div>
				<div class="kt-portlet__body">	
					{!! $travel_blog->description_en !!}
				</div>
			</div>
		</div>
	</div>
	@endif

	


	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="col-sm-10 offset-sm-1">
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">	
				            <a href="{{route('admin.travel_blog_destination.create',$travel_blog->travel_blog_id)}}" class="btn btn-primary btn-sm">
				            <i class="fa fa-plus"></i>add destination</a>
						</h3>
					</div>
				    <div class="kt-portlet__head-label">
				        <h4><strong>Join Travel Blog and Destination</strong></h4>
				    </div>
				</div>
				<div class="kt-portlet__body">
					<table id="travel_blog" class="table table-bordered table-strip">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th>Destination Name</th>
								<th>Country Name</th>
								<th>Image</th>
								<th class="text-center">Edit</th>
				        		<th class="text-center">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($destination_blog as $db)
								@foreach($destinations as $des)
									@if($db->destination_id==$des->destination_id)
									<?php $i++==$i; ?>
										<tr>
											<td class="text-center">{{$i}}</td>
											<td>{{$des->destination_name}}</td>
											<td>{{$des->country->country_name}}</td>
											<td>
												<img src="../../../../uploads/destination/{{$des->destination_image}}" class="rounded" style="width: 100px;height: auto;">
											</td>
											<td class="text-center">
									        	<a href="{{route('admin.travel_blog_destination.edit',$db->blog_destination_id)}}" class="btn btn-outline-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i>
									        	</a>
									        </td>
									        <td class="text-center">
									        	<form  action="{{ route('admin.travel_blog_destination.destroy',$db->blog_destination_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
													@csrf
													@method('delete')												               
													<button class="btn btn-outline-danger" style="margin-left: 10px;"><i class="kt-menu__link-icon flaticon-delete" style="margin: 0px -10px 0px -5px !important;"></i>
													</button>
												</form>
									        </td>
										</tr>
									@endif
								@endforeach
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script')
  
 <script>
 	$(document).ready(function() {
    var table = $('#travel_blog').DataTable( {
       
    } );
} );
 </script> 
<script type="text/javascript">
  $(document).ready(function() {    
    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 1500);
  });
$("#travel_blog_id").select2();
</script>

@endsection
