@extends('backend.layouts.master')
    
@section('css')
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection

@section('title','Wishlist')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Wishlist</li>
              <li class="breadcrumb-item active">Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content-header">
      <div class="container-fluid">
          <div class="col-md-12">
              <form action="{{route("admin.wishlist.search")}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-3">        
                        <div class="form-group">
                          <select id="package_id" class="form-control" name="package_id" autocomplete="package_id">
                              <option value="">Select Package Name</option>
                              @foreach($packages as $package)
                                  <option value="{{$package->package_id}}">{{$package->package_name_mm}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-md-3">        
                        <div class="form-group">
                          <select id="customer_id" class="form-control" name="customer_id" autocomplete="customer_id">
                              <option value="">Select Customer Name</option>
                              @foreach($customers as $customer)
                                @if($customer->name)
                                  <option value="{{$customer->customer_id}}">{{$customer->name}}</option>
                                @else
                                  <option value="{{$customer->customer_id}}">{{$customer->phone_email_google}}</option>
                                @endif
                              @endforeach
                          </select>
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
        {{ $wishlist->appends(request()->input())->links() }}
      </div>            
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
          </div>
          <div class="kt-portlet__head-label">
            <h4><b>Total Wishlist</b> <span class="badge badge-primary"> {{$count_wishlist}}</span>
            </h4>
          </div>    
        </div> 
        <div class="kt-portlet__body table-responsive"> 
          <table id="wishlist" class="table table-bordered table-strip">
            <thead style="text-align: left;">
              <tr>
                <th class="text-center">No.</th>
                <th>Package</th>
                <th>CustomerName</th>
                <th>Phone</th>
              </tr>
            </thead>
            <tbody style="text-align: left;">
              @foreach($wishlist as $list)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td>{{$list->package->package_name_mm}}</td>
                  <td>
                    @if($list->name)
                      {{$list->customer->name}}
                    @else
                      {{$list->customer->phone_email_google}}
                    @endif
                  </td>
                  <td>{{$list->customer->phone_email_google}}</td>
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
  $("#wishlist").DataTable({
      "paging": false, // Allow data to be paged
      "lengthChange": false,
      "searching": false, // Search box and search function will be actived
      "info": false,
      "autoWidth": true,
      "processing": true,  // Show processing 
  });
  $("#package_id").select2();
  $("#customer_id").select2();
} );
</script>
@endsection
