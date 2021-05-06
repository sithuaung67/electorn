@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#destination th{
			color: black;
		}
		#destination td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Destination')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Destination</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.destination.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="destination_name" class="form-control mr-2" placeholder="Search Destination Name">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
								<select id="country_id" class="form-control" name="country_id" autocomplete="country_id">
			                        <option value="">Select Country Name</option>
			                        @foreach($country as $coun)
			                            <option value="{{$coun->country_id}}">{{$coun->country_name}}</option>
			                        @endforeach
		                    	</select>
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
								<select id="popular" class="form-control" name="popular" autocomplete="popular">
			                        <option value="">Select Popular</option>
			                        <option value="1">Yes</option>
			                        <option value="0">No</option>
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
	    	{{ $destination->appends(request()->input())->links() }}
		</div>			
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">	
			            <a href="{{route('admin.destination.create')}}" class="btn btn-primary">
			            <i class="fa fa-plus"></i>add destination</a>
		        	</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Destination</b> <span class="badge badge-primary"> {{$count_destination}}</span>
					</h4>
				</div>		
			</div>
			
		<div class="kt-portlet__body">	
			<table id="destination" class="table table-bordered table-strip">
				<thead style="text-align: left;">
				    <tr>
				        <th class="text-center">No.</th>
				        <th>Name</th>
				        <th>Country</th>
				        <th>Popular</th>
				        <th>Image</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: left;">
				    @foreach($destination as $coun)
				        <tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>{{$coun->destination_name}}</td>
							<td>{{$coun->country->country_name}}</td>
							<td>
								@if($coun->popular=="0")
									<i class="fa fa-circle text-danger btn-sm"></i> {{"No"}}
								@else
									<i class="fa fa-circle text-success btn-sm"></i> {{"Yes"}}
								@endif
							</td>
							<td>
								@if($coun->destination_image)
                                    <img src="../../uploads/destination/{{$coun->destination_image}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 80px;height: 80px;">
								@endif
							</td> 
					        <td>
					        	<a href="{{ route('admin.destination.edit',$coun->destination_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.destination.destroy',$coun->destination_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#destination").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
	$("#country_id").select2();
	$("#popular").select2();
} );
</script> 
@endsection
