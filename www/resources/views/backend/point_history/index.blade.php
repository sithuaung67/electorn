@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#point_history th{
			color: black;
		}
		#point_history td{
			color: black;
		}
		.kt-container{
      color: black;
    }
	</style>

@endsection

@section('title','Point History')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Point History</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						
		<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__body">	
			<table id="point_history" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th>CustomerName</th>
				        <th>Total Point</th>
				        <th>About</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($point_history as $point)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $point->customer_id }}</td>
							<td>{{ $point->total_point }}</td> 
							<td>{{ $point->action }}
					        <td>
					        	<a href="{{ route('admin.point_history.edit',$point->point_history_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.point_history.destroy',$point->point_history_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  
    var table = $('#point_history').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
