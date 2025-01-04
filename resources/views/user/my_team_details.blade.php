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
 
    <div id="appCapsule">

       <h2>packages</h2>
       <table>
               <tr>
                   <th>package Name</th>
                    <th>price</th>
                    <th>Start date</th>
               </tr>
               @foreach ($package as $pk)
                
                 <tr>
                    <td>{{ $pk->type }}</td>
                    <td>{{ $pk->price }}</td>
                    <td>{{ $pk->created_at }}</td>
                 </tr>
                   
               @endforeach
       </table>



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