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
          
    
            .container-ujjal {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                flex-wrap: wrap;
                padding: 20px;
                gap: 20px;
            }
    
            .description-card-ujjal {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 20px;
                width: 400px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                text-align: center;
            }
    
            .description-card-ujjal:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            }
    
            .description-title-ujjal {
                font-size: 1.5em;
                margin-bottom: 10px;
                color: #333;
            }
    
            .description-text-ujjal {
                font-size: 1em;
                line-height: 1.5;
                color: #555;
            }
    
            .form-container-ujjal {
                width: 100%;
                text-align: center;
                margin-top: 20px;
            }
    
            form {
                display: inline-block;
                margin-top: 20px;
            }
    
            .form-label-ujjal {
                display: block;
                margin-bottom: 10px;
                font-size: 1.2em;
                color: #333;
            }
    
            .custom-select-ujjal {
                padding: 10px;
                width: 100%;
                font-size: 1em;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
    
            #submitButton-ujjal {
                background-color: grey;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: not-allowed;
                font-size: 1em;
                transition: background-color 0.3s ease;
            }
    
            #submitButton-ujjal.active {
                background-color: #007bff;
                cursor: pointer;
            }
    
            #submitButton-ujjal:hover.active {
                background-color: #0056b3;
            }
    
        </style>

<div class="container-ujjal">
    <!-- First Card - Centered -->
    <div class="description-card-ujjal">
        <h3 class="description-title-ujjal">{{ $data->name }}</h3>
        <h3 class="description-title-ujjal">Price: {{ $data->price }}</h3>
        <p class="description-text-ujjal">{{ $data->benifit }}</p>
    </div>

    <!-- Second Card - Positioned Left (but near center) -->
    <div class="description-card-ujjal">
        <h3 class="description-title-ujjal">Select Payment Method</h3>
        <p class="description-text-ujjal">
            We have a variety of payment methods like Binance, Bybit, PayPal, Aitim, etc.
        </p>
    </div>

    <!-- Third Card - Positioned Right (but near center) -->
    <div class="description-card-ujjal">
        <h3 class="description-title-ujjal">Account Balance</h3>
        <p class="description-text-ujjal">
            You can use your main account balance. If you don't have sufficient balance, please go to recharge.
        </p>
    </div>
</div>

<!-- Form Container -->
<div class="form-container-ujjal">
    <form action="{{ url('buy/next',$data->id) }}" method="POST">
        @csrf
        <label class="form-label-ujjal">Select Your Payment Method</label>
        <select id="paymentMethod-ujjal" class="custom-select-ujjal" name="paymentMethod" required>
            <option value="" disabled selected>Select a payment method...</option>
            <option value="network">By network</option>
            <option value="account">Use Account Balance</option>
        </select>
        <input type="submit" value="Next" id="submitButton-ujjal" class="inactive" disabled>
    </form>
</div>

<script>
    const selectElement = document.getElementById('paymentMethod-ujjal');
    const submitButton = document.getElementById('submitButton-ujjal');

    // Enable the submit button when a valid option is selected
    selectElement.addEventListener('change', function() {
        if (this.value !== "") {
            submitButton.disabled = false;
            submitButton.classList.add('active');
        } else {
            submitButton.disabled = true;
            submitButton.classList.remove('active');
        }
    });
</script>
   

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