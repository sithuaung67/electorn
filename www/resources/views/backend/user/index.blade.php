@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		
		.kt-container{
			color: black;
		}
		#users th{
			color: black;
		}
		#users td{
			color: black;
		}
	</style>

@endsection

@section('title','Admin Account')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Admin Account</li>
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
						
		             <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
		             <i class="fa fa-plus"></i>add member</a>

					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">
			
			
			<table id="users" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>ID</th>
				        <th>Name </th>
				        <th>Email</th>
				        <th>Profile</th>
				        <th>Roles</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($users as $val)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $val->name }}</td>
							<td>{{ $val->email }}</td>
							<td>
								@if($val->profile)
                                    <img src="../../uploads/user/{{$val->profile}}" class="rounded" style="width: 70px;height: 70px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 70px;height: 70px;">
								@endif
							</td>
					        <td>
					        	 @if(!empty($val->getRoleNames()))
							        @foreach($val->getRoleNames() as $value)
							           <label class="badge badge-success">{{ $value }}</label>
							        @endforeach
							      @endif
					        </td>
						
					                
					        <td>
					        	<a href="{{ route('admin.users.edit',$val->id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>
					        	<form  action="{{ route('admin.users.destroy',$val->id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  
    var table = $('#users').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
