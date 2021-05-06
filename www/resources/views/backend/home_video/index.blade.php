@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('title','Home Video')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Home Video</li>
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
						
		             {{-- <a href="{{ route('admin..create') }}" class="btn btn-success">
		             <i class="fa fa-plus"></i>add  video</a>
 --}}
					</h3>
				</div>
						
			</div>
			
		<div class="kt-portlet__body">	
			<table id="home_video" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>No.</th>
				        <th>Name</th>
				        <th>Image</th>
				        <th>Video</th>
				        <th>Actions</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($home_video as $home_video)
				        <tr>
							<td>{{$loop->iteration }}</td>
							<td>{{$home_video->name}}</td>
							<td>
								@if($home_video->home_cover)
                                    <img src="../../uploads/home_cover/{{$home_video->home_cover}}" class="rounded" style="width: 110px;height: 80px;">
                                @else
                                  	<img src="{{asset('../../favicon.ico')}}" class="rounded" style="width: 80px;height: 80px;">
								@endif
							</td>
							<td>
								@if($home_video->video)
                                    <video style="width: 60%;" controls>
                                        <source src="../uploads/home_video/{{$home_video->video}}" type="video/mp4">
                                        <source src="../uploads/home_video/{{$home_video->video}}" type="video/ogg">
                                        Your browser does not home_video the video tag.
                                    </video>
                                @endif
							</td>
					        <td>
					        	<a href="{{ route('admin.home_video.edit',$home_video->home_video_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>			                	
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
  
    var table = $('#home_video').DataTable( {
       
    } );
} );
 </script> 
 

@endsection
