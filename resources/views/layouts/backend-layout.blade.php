<!DOCTYPE html>
<html lang="en">
<!-- Common Head -->
@include('common.admin-head')
<!-- End Common Head -->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
        <!-- Sidebar Start -->
		@include('admin.home.sidebar')
        <!-- Sidebar Start -->
		<div class="main">
            <!-- Top nav start -->
			@include('admin.home.top-nav')
            <!-- Top nav end -->
            <!-- main content start -->
			@yield('content')
            <!-- main content end -->
            <!-- footer start -->
			@include('admin.home.footer')
            <!-- footer start -->
		</div>
	</div>
	
	
	@include('common.common-js')
	<script src="{{ asset('asset/backend/js/datatables.js')}}"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
	
</body>

</html>