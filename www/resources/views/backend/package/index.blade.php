@extends('backend.layouts.master')
   
@section('css')
   
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <style type="text/css">
      #package th{
         color: black;
      }
      #package td{
         color: black;
      }
      .kt-container{
         color: black;
      }
   </style>

@endsection

@section('title','Package')
@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Package</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
       <div class="container-fluid">
           <div class="col-md-12">
               <form action="{{route("admin.package.search")}}" method="get">
                  @csrf
                  <div class="row">
                     {{-- <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="start_date" id="start_date" class="form-control mr-2" placeholder="Search Only Start Date">
                          </div>
                      </div>
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="end_date" id="end_date" class="form-control mr-2" placeholder="Search Only End Date">
                          </div>
                      </div>  --}}
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="package_name_mm" class="form-control mr-2" placeholder="Search Package Name Myanmar">
                          </div>
                      </div>
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="duration_mm" class="form-control mr-2" placeholder="Search Duration Myanmar">
                          </div>
                      </div>
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="direction_mm" class="form-control mr-2" placeholder="Search Direction Myanmar">
                          </div>
                      </div>
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="text" name="location_en" class="form-control mr-2" placeholder="Search Location English">
                          </div>
                      </div>
                      {{-- <div class="col-md-2">        
                          <div class="form-group">
                           <input type="number" name="stock" class="form-control mr-2" placeholder="Search Stock">
                          </div>
                      </div> --}}
                      <div class="col-md-3">        
                          <div class="form-group">
                           <input type="number" name="twin_share_room_price" class="form-control mr-2" placeholder="Twin Share Room Price">
                          </div>
                      </div>
                       <div class="col-md-3">        
                          <div class="form-group">
                           <input type="number" name="single_room_price" class="form-control mr-2" placeholder="Search Single Room Price">
                          </div>
                      </div>
                       <div class="col-md-3">        
                          <div class="form-group">
                           <input type="number" name="extra_bed_price" class="form-control mr-2" placeholder="Search Extra Bed Price">
                          </div>
                      </div>
                       <div class="col-md-3">        
                          <div class="form-group">
                           <input type="number" name="without_extra_bed_price" class="form-control mr-2" placeholder="Search Without Extra Bed Price">
                          </div>
                      </div>
                      <div class="col-md-3">        
                          <div class="form-group">
                            <select name="pin" id="pin" class="form-control mr-2" placeholder="Search Stock">
                              <option value="">Choose Pin</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-3">        
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
         {{ $package->appends(request()->input())->links() }}
      </div>         
      <div class="kt-portlet kt-portlet--mobile">
         <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
               <h3 class="kt-portlet__head-title"> 
                   <a href="{{route('admin.package.create')}}" class="btn btn-primary">
                   <i class="fa fa-plus"></i>add package</a>
               </h3>&nbsp;&nbsp;
            </div>
            <div class="kt-portlet__head-label">
               <h4><b>Total Package</b> <span class="badge badge-primary"> {{$count_package}}</span></h4>&nbsp;&nbsp;
               <h4><b>Total Pin</b> <span class="badge badge-primary"> {{$count_pin}}</span></h4>
            </div>   
         </div>
         
      <div class="kt-portlet__body table-responsive"> 
         <table id="package" class="table table-bordered table-strip">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Pin</th>
                    <th class="text-center">TourCode</th>
                    <th>PackageNameMM</th>
                    <th>PackageNameEN</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>DurationMM</th>
                    <th>DurationEN</th>
                    <th>LocationMM</th>
                    <th>LocationEN</th>
                    <th>DirectionMM</th>
                    <th>DirectionEN</th>
                    <th class="text-center">WithExtra Bed Price</th>
                    <th class="text-center">WithoutExtra Bed Price</th>
                    <th class="text-center">SingleRoom Price</th>
                    <th class="text-center">TwinShare RoomPrice</th>
                    <th class="text-center">Discount Price</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Image View</th>
                    <th class="text-center">Pakage View</th>
                    <th class="text-center">Pakage Edit</th>
                    <th class="text-center">Pakage Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($package as $pack)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td class="text-center">
                        @if($pack->pin==0)
                          <h5><span class="btn btn-sm btn-danger" style="width: 35px;">{{"No"}}</span></h5>
                        @else
                          <h5><span class="btn btn-sm btn-info" style="width: 35px;">{{"Yes"}}</span></h5>
                        @endif
                      </td>
                      <td class="text-center">{{$pack->tour_code}}</td>
                      <td>{{$pack->package_name_mm}}</td>
                      <td>{{$pack->package_name_en}}</td>
                      <td>
                        {{date('d-M-Y', strtotime($pack->start_date))}}
                      </td>
                      <td>
                        {{date('d-M-Y', strtotime($pack->end_date))}}
                      </td>
                      <td>{{$pack->duration_mm}}</td>
                      <td>{{$pack->duration_en}}</td>
                      <td>{{$pack->location_mm}}</td>
                      <td>{{$pack->location_en}}</td>
                      <td>{{$pack->direction_mm}}</td>
                      <td>{{$pack->direction_en}}</td>
                      <td class="text-center">{{number_format($pack->extra_bed_price)}}</td>
                      <td class="text-center">{{number_format($pack->without_extra_bed_price)}}</td>
                      <td class="text-center">{{number_format($pack->single_room_price)}}</td>
                      <td class="text-center">{{number_format($pack->twin_share_room_price)}}</td>
                      <td class="text-center">{{number_format($pack->discount_price)}}</td>
                      <td class="text-center">
                      @if($pack->portrait_image)
                        <img src="../../uploads/package/{{$pack->portrait_image}}" class="rounded" style="width: 110px;height: 80px;">
                      @else
                        @foreach($package_image as $image)
                           @if($image->package_id==$pack->package_id)
                              <img src="../../uploads/package/{{$image->image}}" class="rounded" style="width: 110px;height: 80px;">
                           @endif
                        @endforeach
                      @endif
                     </td>
                     <td class="text-center">
                        <a href="{{ route('admin.image.view',$pack->package_id) }}" class="btn btn-success btn-sm" style="margin-right: -5px !important;"><i class="fa fa-eye" style="margin: 10px -6px 10px 0px !important;"></i></a>
                     </td>
                     <td class="text-center">
                        <a href="{{ route('admin.package.view',$pack->package_id) }}" class="btn btn-primary btn-sm" style="margin-right: -5px !important;"><i class="fa fa-search-plus" style="margin: 10px -6px 10px 0px !important;"></i></a>
                     </td>
                     <td class="text-center">
                        <a href="{{ route('admin.package.edit',$pack->package_id) }}" class="btn btn-warning btn-sm" style="margin-right: -5px !important;color: white;"><i class="fa fa-edit" style="margin: 10px -6px 10px 0px !important;"></i></a>                 
                     </td>
                     <td class="text-center">
                        <form  action="{{ route('admin.package.destroy',$pack->package_id) }}" method="post" onclick="return confirm('Do you want to delete this item?')" style="display: inline;">
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
   $("#package").DataTable({
       "paging": false, // Allow data to be paged
       "lengthChange": false,
       "searching": false, // Search box and search function will be actived
       "info": false,
       "autoWidth": true,
       "processing": true,  // Show processing 
   });
    $('#start_date').datetimepicker();
    $('#end_date').datetimepicker();
    $('#pin').select2();
} );
</script> 
@endsection