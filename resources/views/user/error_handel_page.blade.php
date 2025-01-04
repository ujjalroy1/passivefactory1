<!doctype html>
<html lang="en">

<head>
       @include('user.css')
</head>

<body>

    <!-- loader -->
        @include('user.loader')
    <!-- * loader -->

    <!-- App Header -->
         @include('user.app_header')
    <!-- * App Header -->


    <!-- App Capsule -->

            
    <div class="text-center p-6 max-w-lg bg-white rounded-lg shadow-lg">
        <h1 class="text-6xl mb-4">😕</h1>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">No Captcha Available</h2>
        <p class="text-gray-600 mb-6">This page is currently not working. Please try again later.</p>
     
      </div>

    <!-- * App Capsule -->

     
    <!-- App Bottom Menu -->
        @include('user.app_bottom_menu')
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    @include('user.app_sidebar')
   
    <!-- * App Sidebar -->



    <!-- iOS Add to Home Action Sheet -->
      @include('user.ios')
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
   @include('user.android')
    <!-- * Android Add to Home Action Sheet -->

    @include('user.cookie')

   
    @include('user.jsfile')


</body>

</html>