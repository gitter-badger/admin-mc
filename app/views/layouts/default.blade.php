@include('includes.header')
<body class="skin-blue">
<!-- Site wrapper -->
<div class="wrapper">

    @include('includes.navBar')

	<!-- =============================================== -->

	<!-- Left side column. contains the sidebar -->
    @include('includes.sideBar')

	<!-- =============================================== -->

	<!-- Right side column. Contains the navbar and content of the page -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		{{--<section class="content-header">
			<h1>
				Blank page
				<small>it all starts here</small>
			</h1>
		</section>--}}

		<!-- Main content -->
		<section class="content">
            @yield('content')
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->


</div><!-- ./wrapper -->
@include('includes.footer')

</body>
</html>