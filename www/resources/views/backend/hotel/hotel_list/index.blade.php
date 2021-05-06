@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#hotel th{
			color: black;
		}
		#hotel td{
			color: black;
		}
		.kt-container{
			color: black;
		}
	</style>

@endsection

@section('title','Hotel')
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
              <li class="breadcrumb-item active">Hotel</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    {{-- <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.hotel_view.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="hotel_name" class="form-control mr-2" placeholder="Search Hotel Name">
		                    </div>
		                </div>
		                <div class="col-md-3">        
		                    <div class="form-group">
		                    	<input type="text" name="hotel_rating" class="form-control mr-2" placeholder="Search Hotel Rating">
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
	</section> --}}
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="pagination">
	    	{{ $hotel->appends(request()->input())->links() }}
		</div>			
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		             <a href="{{route('admin.hotel.create')}}" class="btn btn-primary btn-sm">
		             <i class="fa fa-plus"></i>add hotel</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><span class="btn btn-sm btn-info">for 1 room</span></h4>&nbsp;
					<h4><span class="btn btn-sm btn-warning">for 2 rooms</span></h4>&nbsp;
					<h4><span class="btn btn-sm btn-success">for 3 rooms</span></h4>&nbsp;
					<h4><span class="btn btn-sm btn-danger">for 4 and about 4 rooms</span></h4>&nbsp;
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Hotel</b> <span class="badge badge-primary"> {{$hotel_count}}</span>
					</h4>
				</div>						
			</div>
			
		<div class="kt-portlet__body table-responsive">	
			<table id="hotel" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th style="text-align: center;">No.</th>
				        <th style="text-align: center;">Room</th>
				        <th style="text-align: center;">Status</th>
				        <th>HotelRating</th>
				        <th>HotelName</th>
				        <th>Country</th>
				        <th>State</th>
				        <th>City</th>
				        <th style="text-align: center;">ImageView</th>
				        <th style="text-align: center;">HotelView</th>
				        <th style="text-align: center;">RoomView</th>
				        <th style="text-align: center;">HotelEdit</th>
				        <th style="text-align: center;">HotelDelete</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($hotel as $hot)
				        <tr>
							<td style="text-align: center;">{{ $loop->iteration }}</td>
							<td style="text-align: center;">
								@foreach($room_all as $all)
									@if($all->hotel_id==$hot->hotel_id)
										@if($all->count==1)
											<h5><span class="btn btn-sm btn-info" style="width: 40px;">{{$all->count}}</span></h5>
										@elseif($all->count==2)
											<h5><span class="btn btn-sm btn-warning" style="width: 40px;">{{$all->count}}</span></h5>
										@elseif($all->count==3)
											<h5><span class="btn btn-sm btn-success" style="width: 40px;">{{$all->count}}</span></h5>
										@elseif($all->count > 3)
											<h5><span class="btn btn-sm btn-danger" style="width: 40px;">{{$all->count}}</span></h5>
										@endif
									@endif
								@endforeach
							</td>
							<td style="text-align: center;">
								@if($hot->price_type==0)
									<h5><span class="btn btn-sm btn-info" style="width: 70px;">{{"Local"}}</span></h5>
								@elseif($hot->price_type==1)
									<h5><span class="btn btn-sm btn-danger" style="width: 70px;">{{"Foreign"}}</span></h5>
								@else
									<h5><span class="btn btn-sm btn-success" style="width: 70px;">{{"Both"}}</span></h5>
								@endif
							</td>
							<td>
								@for($i= 1;$i<=$hot->hotel_rating;$i++)
			                        @if($i>5)
			                        	@break(0);
			                        @endif
			                        <i class="fa fa-star" style="color: orange"></i>
			                    @endfor
			                   	@if(5-$hot->hotel_rating > 0)
			                        @for($i= 1;$i<=5-$hot->hotel_rating;$i++)
			                           	<i class="fa fa-star"></i>
			                        @endfor
			                    @endif
							</td>
							<td>{{$hot->hotel_name}}</td>
							<td>{{$hot->country_name}}</td>
							<td>{{$hot->state->state_name}}</td>
							<td>{{$hot->city->township}}</td>
							<td style="text-align: center;">
								<a href="{{route('admin.hotel.image.view.index',$hot->hotel_id)}}" class="btn btn-success btn-sm" style="margin-right: -3px !important;"><i class="fa fa-eye" style="margin: 10px -4px 10px 0px !important;"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{route('admin.hotel.list.view',$hot->hotel_id)}}" class="btn btn-primary btn-sm" style="margin-right: -3px !important;"><i class="fa fa-plus-circle" style="margin: 10px -4px 10px 0px !important;"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{route('admin.hotel_view.index',$hot->hotel_id)}}" class="btn btn-info btn-sm" style="margin-right: -3px !important;"><i class="fa fa-plus-circle" style="margin: 10px -4px 10px 0px !important;"></i></a>
							</td>
							<td style="text-align: center;">
								<a href="{{route('admin.hotel.edit',$hot->hotel_id)}}" class="btn btn-warning btn-sm" style="color: white;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
							</td>
					        <td style="text-align: center;">
					        	<form  action="{{route('admin.hotel.destroy',$hot->hotel_id)}}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
