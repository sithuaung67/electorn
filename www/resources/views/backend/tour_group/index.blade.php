@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#tour_group th{
			color: black;
		}
		#tour_group td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','Tour Group')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Tour Group</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.tour_group.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-3">        
		                    <div class="form-group">
								<select id="tour_leader_id" class="form-control" name="tour_leader_id" autocomplete="tour_leader_id">
			                        <option value="">Tour Leader Name</option>
			                        @foreach($tour_leader as $tour)
			                            <option value="{{$tour->tour_leader_id}}">{{$tour->name}}</option>
			                        @endforeach
		                    	</select>
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<select id="package_id" class="form-control" name="package_id" autocomplete="package_id">
			                        <option value="">Package Name</option>
			                        @foreach($packages as $package)
			                            <option value="{{$package->package_id}}">{{$package->package_name_mm}}({{$package->tour_code}})</option>
			                        @endforeach
		                    	</select>
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
	    	{{ $tour_group->appends(request()->input())->links() }}
		</div>				
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		            <a href="{{route('admin.tour_group.create')}}" class="btn btn-primary">
		            <i class="fa fa-plus"></i>add tour group</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Tour Group Assign</b> <span class="badge badge-primary"> {{$count_tour_group}}</span>
					</h4>
				</div>	
			</div>
			
		<div class="kt-portlet__body">	
			<table id="tour_group" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th style="text-align: center;">No.</th>
				        <th>TourId</th>
				        <th>PackageId</th>
				        <th style="text-align: center;">Actions</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($tour_group as $qus)
				        <tr>
							<td style="text-align: center;">{{ $loop->iteration }}</td>
							<td>{{ $qus->tour_leader->name }}</td>
							<td>{{ $qus->package->package_name_mm }}({{$qus->package->tour_code}})</td> 
					        <td style="text-align: center;">
					        	<a href="{{ route('admin.tour_group.edit',$qus->tour_group_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.tour_group.destroy',$qus->tour_group_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#tour_group").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
	$("#tour_leader_id").select2();
	$("#package_id").select2();
} );
</script> 
@endsection
