@extends('backend.layouts.master')
	
@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<style type="text/css">
      #popup th{
         color: black;
      }
      #popup td{
         color: black;
      }
      .kt-container{
         color: black;
      }
</style>

@endsection

@section('title','Popup')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <div class="flash-message mt-2" id="successMessage">
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
              <li class="breadcrumb-item active">Popup</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
		             <a href="{{ route('admin.popup.create') }}" class="btn btn-info">
		             <i class="fa fa-plus"></i>add  popup</a>
					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="popup" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th>Image</th>
				        <th>Body</th>
				        <th>Status</th>
				        <th>Edit</th>
				        <th>Delete</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($popup as $po)
				        <tr>
							<td>{{$loop->iteration }}</td>
							<td>
								@if($po->image)
                                    <img src="../../uploads/popup/{{$po->image}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 80px;height: 80px;">
								@endif
							</td>
							<td>{{$po->body}}</td>
							<td>
								@if($po->status=="1")
									<h5><span class="btn btn-sm btn-info" style="width: 70px;">{{"Allow"}}</span></h5>
								@else
									<h5><span class="btn btn-sm btn-danger" style="width: 70px;">{{"Deny"}}</span></h5>
								@endif
							</td>
					        <td>
					        	<a href="{{ route('admin.popup.edit',$po->popup_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>			                	
					        </td>
					        <td>
		                        <form  action="{{ route('admin.popup.destroy',$po->popup_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  
    var table = $('#popup').DataTable( {
       
    } );
} );

 	setTimeout(function() {
    $('#successMessage').fadeOut('fast');
}, 1500);
 </script> 
 

@endsection
