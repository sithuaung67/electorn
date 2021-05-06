@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#hotel_booking th{
			color: black;
		}
		#hotel_booking td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Hotel Booking')
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
              		<li class="breadcrumb-item active">Hotel Booking</li>
              		<li class="breadcrumb-item active">Lists</li>
            	</ol>
          </div>
        </div>
    </div>
</section>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	{{-- <div class="pagination">
	    {{ $booking->appends(request()->input())->links() }}
	</div>	 --}}				
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<h4><b>Total Hotel Booking</b> <span class="badge badge-primary"> {{$count_hotel_booking}}</span></h4>
			</div>
			<div class="kt-portlet__head-label">
                <a href="{{route('admin.hotel.booking.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span>
                </a>
            </div>	
		</div>
		<div class="kt-portlet__body table-responsive">	
			<table id="hotel_booking" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th class="text-center">No.</th>
				        <th class="text-center">StatusName</th>
				        <th>HotelBookingId</th>
				        <th>CustomerName</th>
				        <th>HotelName</th>
				        <th>AddressMyanmar</th>
				        <th>AddressEnglish</th>
				        <th>CheckInDate</th>
				        <th>CheckOutDate</th>
				        <th>TotalPrice</th>
				        <th class="text-center">Edit</th>
				        <th class="text-center">Delete</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($hotel_booking as $booking)
				        <tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td class="text-center">
								@if($booking->booking_status_id==1)
									<h5><span class="btn btn-sm btn-info" style="width: 70px;">{{$booking->status->name}}</span></h5>
								@elseif($booking->booking_status_id==2)
									<h5><span class="btn btn-sm btn-success" style="width: 70px;">{{$booking->status->name}}</span></h5>
								@else
									<h5><span class="btn btn-sm btn-danger" style="width: 70px;">{{$booking->status->name}}</span></h5>
								@endif
							</td> 
							<td>{{ $booking->hotel_booking_id }}</td>
							<td>{{ $booking->customer_name }}</td>
							<td>{{ $booking->hotel_name }}</td>
							<td>{!! $booking->address_mm !!}</td>	
							<td>{!! $booking->address_en !!}</td>	
							<td>
								{{date('d-M-Y', strtotime($booking->check_in))}}
							</td>
							<td>
								{{date('d-M-Y', strtotime($booking->check_out))}}
							</td>
							<td>
								@if($booking->price_type==0)
									{{ number_format($booking->total_price) }} MMK
								@else
									{{number_format($booking->total_price) }} USD
								@endif
							</td>
					        <td class="text-center">
					        	<a href="{{ route('admin.hotel.booking.edit',$booking->id) }}" class="btn btn-warning btn-sm" style="margin-right: -5px !important;color: white"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>			                	
					        </td>
					        <td class="text-center">
					        	<form  action="{{ route('admin.hotel.booking.destroy',$booking->id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#hotel_booking").DataTable({
	    "paging": true, // Allow data to be paged
	    "lengthChange": true,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": false,
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
