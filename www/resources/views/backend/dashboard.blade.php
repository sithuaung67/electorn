@extends('backend.layouts.master')

@section('css')
  
    <style>
      .highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.ld-label {
  width:200px;
  display: inline-block;
}

.ld-url-input {
  width: 500px; 
}

.ld-time-input {
  width: 40px;
}

    </style>
@endsection

@section('title','Dashboard')

@section('content')    
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item active">All Lists</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--danger">
                      <i class="fa fa-bars fa-3x" style="width: 40;" aria-hidden="true"></i>
                        
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Total Tours</h3>
                        <a href="{{route('admin.package.index')}}">
                        <h3>{{$package}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                         
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--danger">
                      <i class="fas fa-clipboard-check fa-3x" style="width: 40;" aria-hidden="true"></i>     
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Tour Booking</h3>
                        <a href="{{route('admin.booking.index')}}">
                          <h3>{{$booking}}</h3>
                          <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                         
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--danger">
                      <i class="fa fa-user fa-3x" style="width: 40;" aria-hidden="true"></i>
                        
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Total Customer</h3>
                        <a href="{{route('admin.customer.index')}}">
                          
                        <h3>{{$customer}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                         
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--primary">
                      <i class="fa fa-users fa-3x" style="width: 40;" aria-hidden="true"></i>
                        
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Total Tour Group</h3>
                        <a href="{{route('admin.tour_group.index')}}">
                          
                        <h3>{{$tour_group}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                         
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--primary">
                      <i class="fa fa-user-tie fa-3x" style="width: 40;" aria-hidden="true"></i>  
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Total Tour Leader</h3>
                        <a href="{{route('admin.tour_leader.index')}}">
                        <h3>{{$tour_leader}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--primary">
                      <i class="fas fa-hotel fa-3x" style="width: 40;" aria-hidden="true"></i>  
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Total Hotel</h3>
                        <a href="{{route('admin.hotel.index')}}">
                        <h3>{{$hotel}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet kt-portlet--height-fluid-half kt-widget-12">
            <div class="kt-portlet__body">
                <div class="kt-widget-12__body">
                  <div class="kt-widget-12__head">
                    <div class="kt-widget-12__date kt-widget-12__date--primary">
                      <i class="fas fa-clipboard-check fa-3x" style="width: 40;" aria-hidden="true"></i>  
                    </div>
                    <div class="kt-widget-12__label">
                        <h3 class="kt-widget-12__title">Hotel Booking</h3>
                        <a href="{{route('admin.hotel.booking.index')}}">
                        <h3>{{$hotel_booking}}</h3>
                        <span class="kt-widget-12__desc" style="color: blue;">See More.....</span>
                        </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    
      
@endsection
@section('script')

@endsection 



