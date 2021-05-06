@extends('backend.layouts.master')

@section('css')


  
@endsection
@section('title','Customer Detail')
@section('content')
  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
          <h3 class="kt-subheader__title">Dashboard</h3>
          <span class="kt-subheader__separator kt-hidden"></span>
          <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link">
                Customer View </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>         
          </div>
        </div>
      </div>
    </div>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
      <div class="kt-container  kt-container--fluid">
        <div class="kt-container  kt-container--fluid">
          <div class="col-md-12 text-center">
            @foreach($customers as $customer)
            <a href="{{route('admin.customer.gold.instock.order.view',$customer->id)}}" class="col-md-2 btn btn-sm btn-outline-primary">Gold Instock Orders</a>
            <a href="{{route('admin.customer.gold.custom.order.view',$customer->id)}}" class="col-md-2 btn btn-sm btn-outline-primary">Gold Custom Orders</a>
            <a href="{{route('admin.diamond.order.view',$customer->id)}}" class="col-md-2 btn btn-sm btn-outline-primary">Diamond Orders</a>
            <a href="{{route('admin.platinum.order.view',$customer->id)}}" class="col-md-2 btn btn-sm btn-outline-primary">Platinum Orders</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">  
      <div class="col-md-6 offset-md-3">
        <div class="kt-portlet kt-portlet--mobile">
          <div class="kt-portlet__head text-center">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">Customer Information</h3>
            </div>
            <div class="kt-portlet__head-label">
              <a href="{{route('admin.login.manage')}}"><i class="fa fa-angle-double-left"></i> Back to <span>lists</span></a>
            </div>
          </div> 
          <div class="kt-portlet__body">
            @foreach($customers as $customer)
            <div class="text-center">
                {!! QrCode::size(200)->generate($customer->user_name); !!}
            </div>
            <br>
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td class="col-md-4">ID</td>
                        <td style="color: #1c00cf">{{$customer->id}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">User Name</td>
                        <td style="color: #1c00cf">{{$customer->user_name}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Customer Name</td>
                        <td style="color: #1c00cf">{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">NRC</td>
                        <td style="color: #1c00cf">{{$customer->nrc}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Date Of Birthday</td>
                        <td style="color: #1c00cf">{{date("d-M-Y", strtotime($customer->dob))}}</td>

                    </tr>
                    <tr>
                        <td class="col-md-4">Phone</td>
                        <td style="color: #1c00cf">{{$customer->phone_number}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Shop Name</td>
                        <td style="color: #1c00cf">{{$customer->shop_name}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Address</td>
                        <td style="color: #1c00cf">{{$customer->address}}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Township</td>
                        <td style="color: #1c00cf">{{$customer->town}}</td>
                    </tr>
                    </tbody>
                </table>
                @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>   
 
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#customers').DataTable();
  });
</script>

@endsection