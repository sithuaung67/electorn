@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#tour_leader th{
			color: black;
		}
		#tour_leader td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','Tour Leader')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Tour Leader</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.tour_leader.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="name" class="form-control mr-2" placeholder="Search Name">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="tour_user_name" class="form-control mr-2" placeholder="Search Tour User Name">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="contact_phone" class="form-control mr-2" placeholder="Search Contact Phone">
		                    </div>
		                </div>
		                <div class="col-md-2">        
		                    <div class="form-group">
		                    	<button type="submit" class="form-control btn btn-primary btn-sm ml-2">
	                       			<i class="fa fa-search"></i> {{ __('Search') }}
	                    		</button>
		                    </div>
		                </div>
		            </div>
	           	</form>
	        </div>
	    </div>
	</section>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="pagination">
	    	{{ $tour_leader->appends(request()->input())->links() }}
		</div>			
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		            	<a href="{{route('admin.tour_leader.create')}}" class="btn btn-primary">
		             	<i class="fa fa-plus"></i>add tour leader</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Tour Leader</b> <span class="badge badge-primary"> {{$count_tour_leader}}</span></h4>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="tour_leader" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th style="text-align: center;">No.</th>
				        <th>Name</th>
				        <th>TourUserName</th>
				        <th>Password</th>
				        <th>Contact Phone</th>
				        <th>Image</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($tour_leader as $leader)
				        <tr>
							<td style="text-align: center;">{{ $loop->iteration }}</td>
							<td>{{ $leader->name }}</td>
							<td>{{ $leader->tour_user_name }}</td>
							<td>{{ $leader->password }}</td>
							<td>{{ $leader->contact_phone }}</td>
							<td>
								@if($leader->image)
                                    <img src="../../uploads/customer/{{$leader->image}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 110px;height: 80px;">
								@endif
							</td>
					        <td>
					        	<a href="{{ route('admin.tour_leader.edit',$leader->tour_leader_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.tour_leader.destroy',$leader->tour_leader_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
									@csrf
									@method('delete')												               
									<button class="btn btn-danger" style="margin-left: 10px;"><i class="kt-menu__link-icon flaticon-delete" style="margin: 0px -10px 0px -5px !important;"></i></button>
								</form> 					                	
					        </td>					                         	
				       	</tr>
					@endforeach
				</tbody>
			</table>		
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	$("#tour_leader").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
} );
</script> 
@endsection
