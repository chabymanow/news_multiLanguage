<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.body.head')
        @include('admin.body.scripts')
    </head>
<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        @include('admin.body.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- Upper menubar -->
            @include('admin.body.upper_menu')
            <!-- partial -->
                <div class="main-panel">
                    @yield('admin')

                <footer class="footer">
                    @include('admin.body.footer')
                </footer>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
<!-- container-scroller -->

</body>
</html>
