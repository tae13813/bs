<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>@yield("title", "BikeShop | จําหน่ายอะไหล่จักรยานออนไลน์")</title>
<link rel="stylesheet" href="{{ asset('font-awesome/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('font-awesome/fontawesome/css/all.min.css') }}">
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('public/toastr/toastr.min.css') }}">
<script src="{{ asset('public/toastr/toastr.min.js') }}"></script>
</head>

<body>
<script src="{{ asset('font-awesome/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('font-awesome/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script type="text/javascript">
    toastr.success("บันทึกข้อมูลสำเร็จ");
    toastr.error("ไม่สามารถบันทึกข้อมูลได้" );
    </script> 
<div class="container">
<nav class="navbar navbar-default navbar-static-top">
   
    <div class="navbar-header">
    <a class="navbar-brand" href="#">BikeShop</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
    <li><a href="#">หน้าแรก</a></li>
    <li><a href="{{ URL::to('product/') }}">ข้อมูลสินค้า</a></li>
    <li><a href="#">รายงาน</a></li>
    <li><a href="#">ข้อมูลประเภทสินค้า</a></li>
    </ul>
    </div>
    
    

</nav>@yield("content")
@if(session('msg'))
@if(session('ok'))



<script>toastr.success("{{ session('msg') }}")</script>
@else
<script>toastr.error("{{ session('msg') }}")</script>
@endif
@endif

<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

</div>



</body>
</html>