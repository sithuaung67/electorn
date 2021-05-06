@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('title','Video Tutorial')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Video Tutorial</li>
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
						
		             <a href="{{ route('admin.tutorial.create') }}" class="btn btn-success">
		             <i class="fa fa-plus"></i>add tutorial video</a>

					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="tutorial" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th>Name</th>
				        <th>Image</th>
				        <th>Vido</th>
				        <th>Edit</th>
				        <th>Delete</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($tutorials as $support)
				        <tr>
							<td>{{$loop->iteration }}</td>
							<td>{{$support->name}}</td>
							<td>
								@if($support->photo)
                                    <img src="../../uploads/tutorial_cover/{{$support->photo}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 110px;height: 80px;">
								@endif
							</td>              
							<td>
								@if($support->video)
                                    <video style="width: 60%;" controls>
                                        <source src="../uploads/tutorial_video/{{$support->video}}" type="video/mp4">
                                        <source src="../uploads/tutorial_video/{{$support->video}}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
							</td>
					        <td>
					        	<a href="{{ route('admin.tutorial.edit',$support->id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i>
					        	</a>          	
					        </td>
					        <td>
					        	<form  action="{{ route('admin.tutorial.destroy',$support->id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  
    var table = $('#tutorial').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
