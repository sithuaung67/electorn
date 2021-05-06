@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('title','Member Account')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Banner</li>
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
						
		             <a href="{{ route('admin.banner.create') }}" class="btn btn-success">
		             <i class="fa fa-plus"></i>add banner</a>

					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="banner" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>ID</th>
				        <th>Image</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($banner as $ban)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								@if($ban->image)
                                    <img src="../../uploads/banner/{{$ban->image}}" class="rounded" style="width: 130px;height: 100px;">
                                @else
                                  	<img src="{{asset('../../images/favicon.ico')}}" class="rounded" style="width: 80px;height: 80px;">
								@endif
							</td>       
					        <td>
					        	<a href="{{ route('admin.banner.edit',$ban->id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.banner.destroy',$ban->id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  
    var table = $('#banner').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
