<!DOCTYPE html>
<html lang="en">
    <head>
        @include('main.body.head')

    </head>
    <body>
    <!-- header-start -->
    @include('main.body.header_content')
    <!-- /.header-close -->

    <!-- top-add-start -->
    @include('main.body.top_add')
 <!-- /.top-add-close -->

	<!-- date-start -->
    @include('main.body.date')
  <!-- /.date-close -->

	<!-- notice-start -->
    @include('main.body.scroll')
    <!-- notice-close -->

            @yield('main_content')



	<!-- top-footer-start -->
    @include('main.body.top_footer')
	<!-- /.top-footer-close -->

	<!-- middle-footer-start -->
    @include('main.body.middle_footer')
	<!-- /.middle-footer-close -->

	<!-- bottom-footer-start -->
    @include('main.body.bottom_footer')
    <!-- /.bottom-footer-close -->
    <!-- scripts-start -->
    @include('main.body.scripts')
    <!-- scripts-close -->
	</body>
</html>
