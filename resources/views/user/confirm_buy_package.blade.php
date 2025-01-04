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

        <style type="text/css">
           
    
            .balance-container-ujjal {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
    
            .balance-info-ujjal p {
                font-size: 1.2em;
                color: #333;
                margin: 15px 0;
            }
    
            .balance-info-ujjal .highlight-ujjal {
                font-weight: bold;
                color: #007bff;
            }
    
            .confirm-link-ujjal {
                display: inline-block;
                padding: 12px 20px;
                background-color: #28a745;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 1.1em;
                transition: background-color 0.3s ease;
            }
    
            .confirm-link-ujjal:hover {
                background-color: #218838;
            }
        </style>


        <div class="balance-container-ujjal">
            <div class="balance-info-ujjal">
                <p>Your Main Account Balance: <span class="highlight-ujjal">{{ number_format((double)$wallet->main_balance, 2) }}$</span></p>
                <p>Your Package Price: <span class="highlight-ujjal">{{ number_format((double)$data->price, 2) }}$</span></p>
                <p>After Purchasing, You Will Have: <span class="highlight-ujjal">{{ number_format((double)$wallet->main_balance - (double)$data->price, 2) }}$</span></p>
            </div>
            <div>
                <form action="{{ url('success/buy', $data->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="confirm-link-ujjal">Confirm</button>
                </form>
                
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