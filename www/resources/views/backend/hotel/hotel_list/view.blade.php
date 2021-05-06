@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#hotel_view th{
			color: black;
		}
		#hotel_view td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Room View')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <div class="flash-message mt-3" id="successMessage">
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
              <li class="breadcrumb-item active">Room View</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="pagination">
	    	{{ $room->appends(request()->input())->links() }}
		</div>			
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		             <a href="{{route('admin.hotel.new.room.view.create',$id)}}" class="btn btn-primary btn-sm">
		             <i class="fa fa-plus"></i>add room</a>
					</h3>	
				</div>
				<div class="kt-portlet__head-label">
					<h4>{{$hotel->hotel_name}}</h4>
				</div>
				<div class="kt-portlet__head-label">
					<a href="{{route('admin.hotel.index')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
				</div>						
			</div>
			
			<div class="kt-portlet__body table-responsive">	
				<table id="hotel" class="table table-bordered table-strip">
					<thead>
					    <tr>
					        <th style="text-align: center;">No.</th>
					        <th>RoomImage</th>
					        <th>RoomType</th>
					        <th>RoomView</th>
					        <th>RoomQty</th>
					        <th>ExtraQty</th>
					        <th>ValidFromOne</th>
					        <th>ValidToOne</th>
					        <th>RoomPriceOne(MMK)</th>
					        <th>RoomPriceOne(USD)</th>
					        <th>ExtraPriceOne(MMK)</th>
					        <th>ExtraPriceOne(USD)</th>
					        <th>ValidFromTwo</th>
					        <th>ValidToTwo</th>
					        <th>RoomPriceTwo(MMK)</th>
					        <th>RoomPriceTwo(USD)</th>
					        <th>ExtraPriceTwo(MMK)</th>
					        <th>ExtraPriceTwo(USD)</th>
					        <th>ValidFromThree</th>
					        <th>ValidToThree</th>
					        <th>RoomPriceThree(MMK)</th>
					        <th>RoomPriceThree(USD)</th>
					        <th>ExtraPriceThree(MMK)</th>
					        <th>ExtraPriceThree(USD)</th>
					        <th style="text-align: center;">Edit</th>
					        <th style="text-align: center;">Delete</th>
					    </tr>
					</thead>
					<tbody>
					    @foreach($room as $hot)
					        <tr>
								<td style="text-align: center;">{{ $loop->iteration }}</td>
								<td style="text-align: center;">
									@if($hot->room_img)
	                                    <img src="{{$hot->room_img}}" class="rounded" style="width: 85px;height: 65px;">
	                                @else
	                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 65px;height: 65px;">
									@endif
								</td>
								<td>{{$hot->room_type}}</td>
								<td>{{$hot->room_view}}</td>
								<td>{{$hot->room_qty}}</td>
								<td>{{$hot->extra_qty}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_from_one))}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_to_one))}}</td>
								<td>{{$hot->room_price_local_one}}</td>
								<td>{{$hot->room_price_foreign_one}}</td>
								<td>{{$hot->extra_price_local_one}}</td>
								<td>{{$hot->extra_price_foreign_one}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_from_two))}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_to_two))}}</td>
								<td>{{$hot->room_price_local_two}}</td>
								<td>{{$hot->room_price_foreign_two}}</td>
								<td>{{$hot->extra_price_local_two}}</td>
								<td>{{$hot->extra_price_foreign_two}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_from_three))}}</td>
								<td>{{date('d-M-Y', strtotime($hot->valid_to_three))}}</td>
								<td>{{$hot->room_price_local_three}}</td>
								<td>{{$hot->room_price_foreign_three}}</td>
								<td>{{$hot->extra_price_local_three}}</td>
								<td>{{$hot->extra_price_foreign_three}}</td>
								<td style="text-align: center;">
									<a href="{{route('admin.hotel.room.view.edit',$hot->room_id)}}" class="btn btn-warning btn-sm" style="margin-right: -5px !important;color: white;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
								</td>
						        <td style="text-align: center;">
						        	<form action="{{route('admin.hotel.room.destroy',$hot->room_id)}}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#hotel").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
} );
setTimeout(function() {
	$('#successMessage').fadeOut('fast');
}, 1500);
</script> 
@endsection
