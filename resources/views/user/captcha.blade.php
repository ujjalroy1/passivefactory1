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
    <div id="card-container"></div>

    <script>
      document.getElementById("card-container").innerHTML = `
        <style>
          .card {
            width: 300px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-family: Arial, sans-serif;
          }
  
          .card img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
          }
  
          .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
          }
  
          .card-code {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 10px;
          }
  
          .card-price {
            font-size: 1.2em;
            color: #007bff;
            margin-bottom: 20px;
          }
  
          .card-input {
            display: flex;
            justify-content: space-between;
            align-items: center;
          }
  
          .card-input input {
            padding: 5px;
            width: 60%;
            border-radius: 5px;
            border: 1px solid #ccc;
          }
  
          .card-input button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
          }
  
          .card-input button:hover {
            background-color: #0056b3;
          }
        </style>
  
         <?php
                   $size = count($captcha);
              
                 $random=rand(0, $size-1);
              
               $title=$captcha[$random]->title;
               $code=$captcha[$random]->code;
               $price=$presentCaptchaVal->price;
         ?>

<form action="{{ url('store_captcha_point') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-title">Title : {{ $title }}</div>
        <div class="card-code">Captcha : {{ $code }}</div>
        <img src="captcha_photo/{{ $captcha[$random]->image }}" alt="Product Image">
        <div class="card-price">Price: {{ $price }}</div>

        <!-- Hidden inputs to send $title, $code, and $price -->
        <input type="hidden" name="title" value="{{ $title }}">
        <input type="hidden" name="code" value="{{ $code }}">
        <input type="hidden" name="price" value="{{ $price }}">
        <input type="hidden" name="captchaid" value="{{ $presentCaptchaVal->id }}">

        <div class="card-input">
            <input type="text" name="user_input_captcha" placeholder="Enter Captcha" id="quantity-input">
            <button type="submit">Submit</button>

            <a href="{{ url('captcha1') }}" style="display: inline-block; padding: 7px 14px; background-color: #007bff; color: white; text-align: center; text-decoration: none; border-radius: 5px; font-size: 12px; cursor: pointer; transition: background-color 0.3s ease;" 
               onmouseover="this.style.backgroundColor='#0056b3';" onmouseout="this.style.backgroundColor='#007bff';">Reload</a>
        </div>
    </div>
</form>


      `;
  
      function submitCard() {
        let quantity = document.getElementById("quantity-input").value;
        alert("You Entered capthcha as : " + quantity);
      }
  
      function reloadCard() {
        document.getElementById("quantity-input").value = '';
      }
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