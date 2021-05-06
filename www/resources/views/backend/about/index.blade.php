@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#about th{
			color: black;
		}
		#about td{
			color: black;
		}
	</style>

@endsection

@section('title','About')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">About</li>
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
						
		             <a href="{{route('admin.about.create')}}" class="btn btn-primary">
		             <i class="fa fa-plus"></i>add about</a>

					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="about" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th class="text-left">About English</th>
				        <th class="text-left">About Myanmar</th>
				        <th>View</th>
				        <th>Edit</th>
				        <th>Delete</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($abouts as $noti)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td class="text-left">
								<p class="ArticleBody">{!! substr(strip_tags($noti->about_en), 0, 300) !!}
							        {!! strlen(strip_tags($noti->about_en)) > 50 ? "...ReadMore" : "" !!} 
							    </p>
							</td>
							<td class="text-left">
								<p class="ArticleBody">{!! substr(strip_tags($noti->about_mm), 0, 1000) !!}
							        {!! strlen(strip_tags($noti->about_mm)) > 50 ? "...ReadMore" : "" !!} 
							    </p>
							</td>
							<td>
					        	<a href="{{ route('admin.about.view',$noti->about_id) }}" class="btn btn-outline-primary btn-sm" style="margin-right: -5px !important;">
					        		<i class="fa fa-eye" style="margin: 10px -6px 10px 0px !important;"></i>
					        	</a> 					                	
					        </td>
					        <td>
					        	<a href="{{ route('admin.about.edit',$noti->about_id) }}" class="btn btn-outline-primary btn-sm" style="margin-right: -5px !important;">
					        		<i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i>
					        	</a> 					                	
					        </td>
					        <td>
					        	<form  action="{{ route('admin.about.destroy',$noti->about_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
									@csrf
									@method('delete')												               
									<button class="btn btn-outline-danger" style="margin-left: 10px;"><i class="kt-menu__link-icon flaticon-delete" style="margin: 0px -10px 0px -5px !important;"></i>
									</button>
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
  
    var table = $('#about').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
