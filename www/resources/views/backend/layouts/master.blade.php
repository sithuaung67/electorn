<!DOCTYPE html>

<html lang="en">
<head>
    @include('backend.layouts._partial.meta')
    @include('backend.layouts._partial.css')
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Header Mobile -->
{{-- @include('backend.layouts._partial.mobile-view') --}}

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('backend.layouts._partial.sidebar')
     
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            @include('backend.layouts._partial.header')

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

               
                
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <section>
                        @yield('content')
                    </section> 
                </div>
                <!-- end:: Content -->
            </div>
            <!-- begin:: Footer -->
            @include('backend.layouts._partial.footer')
            <!-- end:: Footer -->
        </div>
        <!-- end:: Wrapper -->
    </div>
    <!-- end:: Page -->
</div>
</div>

<!-- end:: Root -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="la la-arrow-up"></i>
</div>
@include('backend.layouts._partial.script')
@stack('scripts')

</body>

<!-- end::Body -->
</html>
