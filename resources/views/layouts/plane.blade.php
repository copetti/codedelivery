<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>CodeDelivery</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<link rel="stylesheet" href="{{ asset("/css/bootstrap.css") }}" />
	<link rel="stylesheet" href="{{ asset("/css/font-awesome.css") }}" />
	<link rel="stylesheet" href="{{ asset("/css/sb-admin-2.css") }}" />
	<link rel="stylesheet" href="{{ asset("/css/timeline.css") }}" />
</head>
<body>
@yield('body')

<script src="{{ asset("js/jquery.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/bootstrap.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/Chart.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/metisMenu.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/sb-admin-2.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend.js") }}" type="text/javascript"></script>

@if(Request::is('admin.categories/*') || Request::is('admin.categories'))
	<script src="{{ asset("js/categories.js") }}" type="text/javascript"></script>
@endif

@yield('post-script')

</body>
</html>