<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('web-site.layouts.header-css-files')
</head>
<body>
<div class="super_container">

   @include('web-site.layouts.header')	

   @section('main-content')
      @show

   @include('web-site.layouts.footer')   
</div>
@include('web-site.layouts.footer-js-files')
</body>
</html>