@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#join_table th{
			color: black;
		}
		#join_table td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','Join Table')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Join Table</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.join_table.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-3">        
		                    <div class="form-group">
								<select id="package_id" class="form-control" name="package_id" autocomplete="package_id">
			                        <option value="">Select Package Name</option>
			                        @foreach($packages as $package)
			                            <option value="{{$package->package_id}}">{{$package->package_name_mm}}({{$package->tour_code}})</option>
			                        @endforeach
		                    	</select>
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
								<select id="destination_id" class="form-control" name="destination_id" autocomplete="destination_id">
			                        <option value="">Select Destination Name</option>
			                        @foreach($destinations as $des)
			                            <option value="{{$des->destination_id}}">{{$des->destination_name}}</option>
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
	    	{{ $join_table->appends(request()->input())->links() }}
		</div>				
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">	
		             	<a href="{{route('admin.join_table.create')}}" class="btn btn-primary">
		             	<i class="fa fa-plus"></i>add join table</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Join Table</b> <span class="badge badge-primary"> {{$count_join_table}}</span>
					</h4>
				</div>	
			</div>
			
		<div class="kt-portlet__body">	
			<table id="join_table" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th class="text-left">Package Name</th>
				        <th>Destination Name</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($join_table as $join)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td class="text-left">
								{{$join->package->package_name_mm}}({{$join->package->tour_code}})
							</td>
							<td class="text-left">
								{{$join->destination->destination_name}}
							</td>
					        <td>
					        	<a href="{{ route('admin.join_table.edit',$join->join_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.join_table.destroy',$join->join_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#join_table").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
	$("#package_id").select2();
	$("#destination_id").select2();
} );
</script> 
@endsection
