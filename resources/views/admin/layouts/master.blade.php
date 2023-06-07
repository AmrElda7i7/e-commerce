
		@include('admin.layouts.head')


	<body class="main-body app sidebar-mini">

		<!-- /Loader -->
			
		<!-- main-content -->
		<div class="main-content app-content">
			@include('admin.layouts.sidebar')
			@include('admin.layouts.header')			
			<!-- container -->
			<div class="container-fluid">

		
			@yield('content') 
            	@include('admin.layouts.footer')	
                @include('admin.layouts.js')
				</div>
			</div>
