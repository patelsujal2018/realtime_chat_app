<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Backend | @yield('page_title')</title>

    <link href="{{ url('backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ url('backend/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ url('backend/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ url('backend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css') }}" rel="stylesheet">

    <link rel='shortcut icon' href="{{ url('backend/uploads/company/favicon.png') }}" type='image/png' />

    @yield('styles')

</head>

<body class="">

    <div id="wrapper">
        @include('layouts.backend.rightsidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('layouts.backend.topbar')
            </div>

            @yield('breadcrumb')

            <div class="wrapper wrapper-content">
                @yield('content')
            </div>

            @include('layouts.backend.footer')

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ url('backend/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('backend/js/inspinia.js') }}"></script>
    <script src="{{ url('backend/js/plugins/pace/pace.min.js') }}"></script>

    <script src="{{ url('backend/js/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('backend/js/plugins/toastr/custom_toastr.js') }}"></script>

    <script src="{{ url('backend/js/plugins/dataTables/datatables.min.js') }}"></script>

    <script type="text/javascript">
      @if(Session::has('toastr'))
        var type = "{{ Session::get('type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('toastr') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('toastr') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('toastr') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('toastr') }}");
                break;
        }
      @endif
    </script>

    @yield('scripts-js')
</body>
</html>