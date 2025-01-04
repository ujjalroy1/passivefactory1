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
            * {
                box-sizing: border-box;
            }
        
            .container {
                max-width: 1200px;
                margin: auto;
            }
        
            .cards {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }
        
            .card {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 20px;
                margin: 10px;
                flex: 1 1 23%; /* Responsive: 4 cards in a row */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s;
                cursor: pointer;
            }
        
            .card:hover {
                transform: translateY(-5px);
            }
        
            .card h3 {
                margin: 0 0 10px;
            }
        
            .card p {
                color: #555;
            }
        
            .buy-button {
                background-color: #ddd; /* Inactive color */
                color: white;
                border: none;
                padding: 7px 10px;
                border-radius: 5px;
                cursor: not-allowed; /* Inactive state */
            }
        
            .buy-button.active {
                background-color: #007bff; /* Active color */
                cursor: pointer;
            }
        
            .buy-button:hover.active {
                background-color: #0056b3;
            }
        
            .info-area {
                margin-top: 20px;
                
            }
        
            textarea {
                width: 100%;
                height: 100px;
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 10px;
                font-size: 16px;
                resize: none;
                background-color: #f9f9f9;
                color: #333;
            }
        </style>
        
        <div class="container">
            <div class="info-area">
                <textarea id="infoTextArea" readonly placeholder="Click on a card to see its info here..."></textarea>
            </div>
        
            @foreach ($package as $pk)
            <div class="cards">
                <div class="card" data-info="{{ $pk->benifit }}">
                    <h3>{{ $pk->name }}</h3>
                    <p>Price: {{ $pk->price }}$</p>
                    <label>Fill the box to activate buy</label><input type="checkbox" class="buy-checkbox">
                    
                    <form action="{{ url('buyPackage',$pk->id) }}" method="POST" class="buy-form">
                        @csrf
                        <input type="hidden" name="name" value="{{ $pk->name }}">
                        <input type="hidden" name="price" value="{{ $pk->price }}">
                        <textarea name="benifit" readonly style="display: none;">{{ $pk->benifit }}</textarea>
                        <input type="submit" class="buy-button" value="Buy Now" disabled>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        
        <script>
            // Add click event listeners to each card
            document.querySelectorAll('.card').forEach(card => {
                card.addEventListener('click', function() {
                    // Get the information from the data attribute
                    const info = card.getAttribute('data-info');
                    
                    // Set the textarea's value to the card's info
                    document.getElementById('infoTextArea').value = info;
                });
            });
        
            // Handle checkbox change events to enable/disable the buy button
            document.querySelectorAll('.buy-checkbox').forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    const form = document.querySelectorAll('.buy-form')[index];
                    const buyButton = form.querySelector('.buy-button');
                    
                    if (checkbox.checked) {
                        buyButton.disabled = false;
                        buyButton.classList.add('active');
                    } else {
                        buyButton.disabled = true;
                        buyButton.classList.remove('active');
                    }
                });
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