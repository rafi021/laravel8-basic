<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sleek - Admin Dashboard Template</title>

    @include('admin.dashboard_layout.style')
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
        ====================================
        ——— LEFT SIDEBAR WITH FOOTER
        =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                @include('admin.dashboard_layout.app-brand')
                <!-- begin sidebar scrollbar -->
                @include('admin.dashboard_layout.sidebar-scrollbar')
                
                <hr class="separator" />
                @include('admin.dashboard_layout.sidebar-footer')
            </div>
        </aside>
        <div class="page-wrapper">
            @include('admin.dashboard_layout.header')
            <div class="content-wrapper">
                <div class="content">
                    @yield('admin_content')
                </div>
            </div>
            @include('admin.dashboard_layout.footer')
        </div>
    </div>
    @include('admin.dashboard_layout.script')
</body>

</html>