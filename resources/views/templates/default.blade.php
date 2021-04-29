<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- header -->
@include('inc.head')

<body>
   
      
<!-- navbar -->
@include('inc.navbar')

<!-- sidebar -->
@include('inc.sidebar')
   
     
       <!--content -->
	@yield('content')
	<!-- end content -->
    </div>
            {{-- @include('inc.footer') --}}
           
       
 
    <!-- script -->
@include('inc.script')

</body>

</html>