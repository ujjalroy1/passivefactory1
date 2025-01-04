<!doctype html>
<html lang="en">

<head>
       @include('user.css')
       @include('user.nft_css')
</head>

<body>

    <!-- loader -->
        @include('user.loader')
    <!-- * loader -->

    <!-- App Header -->
         @include('user.app_header')
    <!-- * App Header -->


    <!-- App Capsule -->

       <div id="appCapsule">


        <div id="mainContainerujjal">
        <div class="containerujjal">
            <!-- Fixed Navigation Bar -->
              @include('user.nft_navebar')
    
            <!-- Scrollable Content Section -->
            <div class="contentujjal">

                  <p>You already bought your nft for today please wait a day</p>
            </div>



        </div>

        </div>
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