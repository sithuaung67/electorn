@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style type="text/css">
		#travel_blog th{
			color: black;
		}
		#travel_blog td{
			color: black;
		}
		.kt-container{
      		color: black;
    	}
	</style>

@endsection

@section('title','Travel Blog')
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
              <li class="breadcrumb-item active">Travel Blog</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
	    <div class="container-fluid">
	        <div class="col-md-12">
	            <form action="{{route("admin.travel_blog.search")}}" method="get">
		            @csrf
		            <div class="row">
		                <div class="col-md-5">        
		                    <div class="form-group">
								<input type="text" name="travel_blog_name_mm" class="form-control" autocomplete="travel_blog_name_mm" placeholder="Search Travel Blog Name Myanmar">
		                    </div>
		                </div>
		                <div class="col-md-5">        
		                    <div class="form-group">
								<input type="text" name="travel_blog_name_en" class="form-control" autocomplete="travel_blog_name_en" placeholder="Search Travel Blog Name English">
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
		<div class="pagination">
	    	{{ $travel_blog->appends(request()->input())->links() }}
		</div>			
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">	
		            <a href="{{route('admin.travel_blog.create')}}" class="btn btn-primary">
		            <i class="fa fa-plus"></i>add travel blog</a>
					</h3>
				</div>
				<div class="kt-portlet__head-label">
					<h4><b>Total Travel Blog</b> <span class="badge badge-primary"> {{$count_travel_blog}}</span>
					</h4>
				</div>		
			</div>
			
		<div class="kt-portlet__body table-responsive">	
			<table id="travel_blog" class="table table-bordered table-strip">
				<thead>
				    <tr>
				        <th class="text-center">No.</th>
				        <th>TravelBlogName_Myanmar</th>
				        <th>TravelBlogName_English</th>
				        <th class="text-center">Image</th>
				        <th class="text-center">View</th>
				        <th class="text-center">Edit</th>
				        <th class="text-center">Delete</th>
				    </tr>
				</thead>
				<tbody>
				    @foreach($travel_blog as $blog)
				        <tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>
								@if($blog->travel_blog_name_mm)
									{{ $blog->travel_blog_name_mm }}
								@else
									{{ "အချက်အလက်မဖြည့်ပါ" }}
								@endif
							</td>
							<td>
								@if($blog->travel_blog_name_en)
									{{ $blog->travel_blog_name_en }}
								@else
									{{ "Unknown" }}
								@endif
							</td>
							<td class="text-center">
								@if($blog->image)
                                    <img src="../../uploads/travel_blog/{{$blog->image}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 110px;height: 80px;">
								@endif
							</td>
					        <td class="text-center">
					        	<a href="{{ route('admin.travel_blog.view',$blog->travel_blog_id) }}" class="btn btn-outline-primary btn-sm" style="margin-right: -3px !important;"><i class="fa fa-eye" style="margin: 10px -5px 10px 0px !important;"></i>
					        	</a>					                	
					        </td>
					        <td class="text-center">
					        	<a href="{{ route('admin.travel_blog.edit',$blog->travel_blog_id) }}" class="btn btn-outline-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i>
					        	</a>
					        </td>
					        <td class="text-center">
					        	<form  action="{{ route('admin.travel_blog.destroy',$blog->travel_blog_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
	$("#travel_blog").DataTable({
	    "paging": false, // Allow data to be paged
	    "lengthChange": false,
	    "searching": false, // Search box and search function will be actived
	    "info": false,
	    "autoWidth": true,
	    "processing": true,  // Show processing 
	});
	$("#destination_id").select2();
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
