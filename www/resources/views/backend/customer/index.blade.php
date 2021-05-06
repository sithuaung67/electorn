@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#customer_image th{
			color: black;
		}
		#customer_image td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Customer')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Customer</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.customer.search")}}" method="get">
		            @csrf
		            <div class="row">   
		                <div class="col-md-2">        
		                    <div class="form-group">
		                    	<input type="text" name="name" class="form-control mr-2" placeholder="Search Name">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="phone_email_google" class="form-control mr-2" placeholder="Search Phone Email Google">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="gmail" class="form-control mr-2" placeholder="Search Gmail">
		                    </div>
		                </div>
		                <div class="col-md-2">        
		                    <div class="form-group">
		                    	<input type="text" name="passport_number" class="form-control mr-2" placeholder="Passport Number">
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
	    	{{ $customer->appends(request()->input())->links() }}
		</div>		
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		             <a href="{{route('admin.customer.create')}}" class="btn btn-primary">
		             <i class="fa fa-plus"></i>add customer</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Customer</b> <span class="badge badge-primary"> {{$count_customer}}</span>
					</h4>
				</div>		
			</div>
			
		<div class="kt-portlet__body table-responsive">	
			<table id="customer" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th class="text-center">No.</th>
				        <th>Image</th>
				        {{-- <th>Type</th> --}}
				        <th>CustomerName</th>
				        <th>PhoneEmailGoogle</th>
				        <th>Gmail</th>
				        <th>Phone</th>
				        <th>Birthday</th>
				        <th>PassportNumber</th>
				        <th>IssueDate</th>
				        <th>ExpireDate</th>
				        <th>TotalPoint</th>
				        <th>Edit</th>
				        <th>Delete</th>
				    </tr>
				</thead>
				<tbody style="text-align: left;">
				    @foreach($customer as $cus)
				        <tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>
								@if($cus->customer_image)
                                    <img src="../../uploads/customer/{{$cus->customer_image}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 110px;height: 80px;">
								@endif
							</td> 
							{{-- <td>{{$cus->customer_type}}</td> --}}
							<td>
								@if($cus->name)
									{{$cus->name}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->phone_email_google)
									{{$cus->phone_email_google}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->gmail)
									{{$cus->gmail}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->phone)
									{{$cus->phone}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->birthday)
									{{-- {{$cus->birthday}} --}}
									{{date('d-M-Y', strtotime($cus->birthday))}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->passport_number)
									{{$cus->passport_number}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->issue_date)
									{{-- {{$cus->issue_date}} --}}
									{{date('d-M-Y', strtotime($cus->issue_date))}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td>
								@if($cus->expire_date)
									{{-- {{$cus->expire_date}} --}}
									{{date('d-M-Y', strtotime($cus->expire_date))}}
								@else
									{{"Unknown"}}
								@endif
							</td>
							<td class="text-center">
								@if($cus->total_point)
									{{$cus->total_point}}
								@else
									{{"0"}}
								@endif
							</td>
					        <td class="text-center">
					        	<a href="{{ route('admin.customer.edit',$cus->customer_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        </td>
					        <td class="text-center">
					        	<form  action="{{ route('admin.customer.destroy',$cus->customer_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#customer").DataTable({
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
