@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#booking th{
			color: black;
		}
		#booking td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Booking')
@section('content')
<section class="content-header">
    <div class="container-fluid">
       	<div class="row mb-2">
          	<div class="col-sm-8 mt-2">
          		<div class="flash-message" id="successMessage">
			      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			        @if(Session::has('alert-' . $msg))
			        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
			        @endif
			      @endforeach
			    </div>
          	</div>
        	<div class="col-sm-4">
            	<ol class="breadcrumb float-sm-right">
              		<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              		<li class="breadcrumb-item active">Booking</li>
              		<li class="breadcrumb-item active">Lists</li>
            	</ol>
          </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="col-md-12">
            <form action="{{route("admin.booking.search")}}" method="get">
	            @csrf
	            <div class="row">   
	                <div class="col-md-2">        
	                    <div class="form-group">
	                    	<input type="text" name="booking_id" class="form-control mr-2" placeholder="Search Booking Id">
	                    </div>
	                </div>
	                <div class="col-md-3">        
	                    <div class="form-group">
	                    	<select id="customer_id" class="form-control" name="customer_id" autocomplete="customer_id">
		                        <option value="">Customer Name</option>
		                        @foreach($customers as $customer)
		                            @if($customer->name)
		                            	<option value="{{$customer->customer_id}}">{{$customer->name}}</option>
		                            @else
										<option value="{{$customer->customer_id}}">{{$customer->phone_email_google}}</option>
		                            @endif
		                        @endforeach
                    		</select>
	                    </div>
	                </div>
	                <div class="col-md-3">        
	                    <div class="form-group">
	                    	<select id="package_id" class="form-control" name="package_id" autocomplete="package_id">
		                        <option value="">Package Name</option>
		                        @foreach($packages as $package)
		                            <option value="{{$package->package_id}}">{{$package->package_name_mm}}</option>
		                        @endforeach
		                    </select>
	                    </div>
	                </div>
	                <div class="col-md-2">        
	                    <div class="form-group">
	                    	<select id="booking_status_id" class="form-control" name="booking_status_id" autocomplete="booking_status_id">
		                        <option value="">Status Name</option>
		                        @foreach($booking_status as $status)
		                            <option value="{{$status->booking_status_id}}">{{$status->name}}</option>
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
	{{-- <div class="pagination">
	    {{ $booking->appends(request()->input())->links() }}
	</div> --}}					
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h4><b>Total Booking</b> <span class="badge badge-primary"> {{$count_booking}}</span></h4>
			</div>
			<div class="kt-portlet__head-label">
				<h4><span class="btn btn-sm btn-info">Qty for 1 person</span></h4>&nbsp;
				<h4><span class="btn btn-sm btn-warning">Qty for 2 persons</span></h4>&nbsp;
				<h4><span class="btn btn-sm btn-success">Qty for 3 persons</span></h4>&nbsp;
				<h4><span class="btn btn-sm btn-danger">Qty for 4 and about 4 persons</span></h4>&nbsp;
			</div>		
		</div>
			
		<div class="kt-portlet__body table-responsive">	
			<table id="booking" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th class="text-center">No.</th>
				        <th class="text-center">StatusName</th>
				        <th class="text-center">Qty</th>
				        <th>BookingId</th>
				        <th>CustomerName</th>
				        <th>PackageName</th>
				        <th>FirstName</th>
				        <th>LastName</th>
				        <th>Nationality</th>
				        <th>PasswordNumber</th>
				        <th>IssueDate</th>
				        <th>ExpireDate</th>
				        <th>Email</th>
				        <th>Phone</th>
				        <th>Note</th>
				        <th class="text-center">View</th>
				        <th class="text-center">Edit</th>
				        <th class="text-center">Delete</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($booking as $book)
				        <tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td class="text-center">
								@if($book->booking_status_id==1)
									<h5><span class="btn btn-sm btn-info" style="width: 70px;">{{$book->status->name}}</span></h5>
								@elseif($book->booking_status_id==2)
									<h5><span class="btn btn-sm btn-success" style="width: 70px;">{{$book->status->name}}</span></h5>
								@else
									<h5><span class="btn btn-sm btn-danger" style="width: 70px;">{{$book->status->name}}</span></h5>
								@endif
							</td> 
							<td class="text-center">
								@foreach($booking_all as $all)
									@if($all->booking_id==$book->booking_id)
										@if($all->count==1)
											<h5><span class="btn btn-sm btn-info">{{$all->count}}</span></h5>
										@elseif($all->count==2)
											<h5><span class="btn btn-sm btn-warning">{{$all->count}}</span></h5>
										@elseif($all->count==3)
											<h5><span class="btn btn-sm btn-success">{{$all->count}}</span></h5>
										@elseif($all->count > 3)
											<h5><span class="btn btn-sm btn-danger">{{$all->count}}</span></h5>
										@endif
									@endif
								@endforeach
							</td>
							<td>{{ $book->booking_id }}</td>
							<td>{{ $book->customer_name }}</td>
							<td>{{ $book->package_name }}</td>
							<td>{{ $book->first_name }}</td>
							<td>{{ $book->last_name }}</td>
							<td>{{ $book->nationality }}</td>
							<td>{{ $book->passport_number }}</td>
							<td>
								{{-- {{ $book->issue_date }} --}}
								{{date('d-M-Y', strtotime($book->issue_date))}}
							</td>
							<td>
								{{-- {{ $book->expire_date }} --}}
								{{date('d-M-Y', strtotime($book->expire_date))}}
							</td>
							<td>{{ $book->email }}</td>
							<td>{{ $book->phone }}</td>
							<td>{!! $book->note !!}</td>
					        <td class="text-center">
					        	<a href="{{ route('admin.booking.view',$book->id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-search-plus" style="margin: 10px -6px 10px 0px !important;"></i></a>			                	
					        </td>
					        <td class="text-center">
					        	@foreach($booking_all as $all)
									@if($all->booking_id==$book->booking_id)
										@if($all->count==1)
											<a href="{{ route('admin.booking_all.edit',$book->id) }}" class="btn btn-warning btn-sm" style="margin-right: -5px !important;color: white"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
										@else
											<a href="{{ route('admin.booking_edit.view',$book->booking_id) }}" class="btn btn-warning btn-sm" style="margin-right: -5px !important;color: white"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
										@endif
									@endif
								@endforeach		                	
					        </td>
					        <td class="text-center">
					        	<form  action="{{ route('admin.booking_all.destroy',$book->booking_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#booking").DataTable({
	    "paging": true, // Allow data to be paged
	    "lengthChange": true,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true, 
	    "pageLength": 25 // Show processing 
	});
	$("#customer_id").select2();
	$("#package_id").select2();
	$("#booking_status_id").select2();
} );
</script> 
<script type="text/javascript">
  $(document).ready(function() {    
    setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 1500);
  });
</script>

@endsection
