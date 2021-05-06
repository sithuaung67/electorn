@extends('backend.layouts.master')
	
@section('css')
	
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('title','Feedback')
@section('content')
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Feedback</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
      <div class="container-fluid">
          <div class="col-md-12">
              <form method="get" action="{{route('admin.feedback.search')}}">
		           	@csrf                                      
		            <div class="form-group row">
		                <div class="col-md-3">
		                    <select id="star" class="form-control @error('star') is-invalid @enderror" name="star" value="{{ old('star') }}" autocomplete="star" autofocus>
		                        <option value="0">All Star</option>
		                        <option value="1">One Star</option>
		                        <option value="2">Two Stars</option>
		                        <option value="3">Three Stars</option>
		                        <option value="4">Four Stars</option>
		                        <option value="5">Five Stars</option>
		                    </select>
		                    @error('star')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
		                    @enderror
		                </div> 
		              	<div class="col-md-3">
		                    <button type="submit" class="btn btn-outline-primary">
		                        <i class="fa fa-search"></i> {{ __('search') }}
		                    </button>
		                </div>
		            </div>
		        </form>
          </div>
      </div>
    </section>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="pagination">
        {{ $feedback->appends(request()->input())->links() }}
      	</div>
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">	
				        <h4><b>Total Feedback</b> <span class="badge badge-primary"> {{$count_feedback}}</span>
		            	</h4>
					</h3>
				</div>
			</div>
		<div class="kt-portlet__body">	
			<table id="feedback" class="table table-bordered table-strip">
				<thead style="text-align: center;">
				    <tr>
				        <th>အမှတ်စဥ်</th>
				        <th>အဆင့်သတ်မှတ်ချက်</th>
				        <th>အကြောင်းအရာ</th>
				        <th>လုပ်ဆောင်ချက်</th>
				    </tr>
				</thead>
				<tbody style="text-align: center;">
				    @foreach($feedback as $feed)
				        <tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								@for($i= 1;$i<=$feed->star;$i++)
                                    @if($i>5)
                                        @break(0);
                                    @endif
                                <i class="fa fa-star" style="color: orange"></i>
                                @endfor
                             	@if(5-$feed->star > 0)
                                    @for($i= 1;$i<=5-$feed->star;$i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
							</td>
							<td>{{$feed->about}}</td>              
					        <td>
					        	<form  action="{{ route('admin.feedback.destroy',$feed->id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
  $("#feedback").DataTable({
      "paging": false, // Allow data to be paged
      "lengthChange": false,
      "searching": false, // Search box and search function will be actived
      "info": false,
      "autoWidth": true,
      "processing": true,  // Show processing 
  });
  $("#star").select2();
} );
</script>
@endsection
