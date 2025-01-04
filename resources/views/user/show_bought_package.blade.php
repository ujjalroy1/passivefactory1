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
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
    
            caption {
                caption-side: top;
                font-size: 1.5em;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: center;
            }
    
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
    
            th {
                background-color: #4CAF50; /* Dark background for header */
                color: white; /* Light text color for header */
            }
    
            tr:nth-child(even) {
                background-color: #f2f2f2; /* Alternating row color */
            }
    
            td {
                background-color: #ffffff; /* Light background for rows */
                color: #333333; /* Dark text color */
            }
    
            table, th, td {
                border: 1px solid #ccc; /* Border for the whole table */
            }
    
            tr:hover {
                background-color: #ddd; /* Hover effect */
            }
        </style>

        <table>
            <caption>Your Current Package</caption>
            <tr>
                <th>Your Package Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Started At</th>
            </tr>
            <!-- Simulating dynamic data from Laravel Blade template -->
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->type }}</td>
                <td>{{ $d->price }}</td>
                <td>{{ $d->duration }}</td>
                <td>{{ $d->created_at }}</td>
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