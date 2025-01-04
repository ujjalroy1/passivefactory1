<!doctype html>
<html lang="en">

<head>
    @include('user.css')
    @include('user.nft_css')
    <style type="text/css">
        /* Basic resets */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Header styling */
        .header {
            width: 100%;
            max-width: 800px;
            text-align: center;
            padding: 15px;
            background: linear-gradient(90deg, #7e57c2, #64b5f6);
            color: #fff;
            font-size: 1.8em;
            font-weight: bold;
            border-radius: 10px;
            margin: 20px auto; /* Center the header */
        }

        /* Navigation tabs styling */
        .nav-tabs {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
            max-width: 800px;
            background-color: #d4e157;
            padding: 10px 0;
            border-radius: 10px;
            margin: 20px auto; /* Center the navigation */
        }

        .nav-tabs div {
            padding: 10px 20px;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        .nav-tabs div:hover {
            background-color: #b2dfdb;
        }

        /* Scrollable content section */
        .scrollable-content {
            max-height: calc(100vh - 200px); 
            overflow-y: auto; 
            padding: 20px 0; 
        }

        /* Container for scrollable cards with wrapping */
        .cards-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center; 
            gap: 15px;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Individual card styling */
        .card {
            flex: 1 1 calc(33.333% - 30px); /* Allows 3 cards per row, adjusts with gaps */
            max-width: 220px;
            background: linear-gradient(90deg, #7e57c2, #64b5f6);
            border-radius: 10px;
            text-align: center;
            padding: 15px;
            color: #fff;
            font-weight: bold;
            font-size: 1em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Image styling */
        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .nft-code {
            font-size: 1em;
            color: #000;
            background-color: #a5d6a7;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 10px;
        }

        /* Price field styling */
        .price-field {
            width: 80%;
            padding: 8px;
            margin-bottom: 10px;
            text-align: center;
            border: none;
            border-radius: 5px;
            background-color: #ffeb3b;
            color: #333;
            font-weight: bold;
            font-size: 1em;
        }

        /* Sell button styling */
        .sell-button {
            width: 80%;
            padding: 8px;
            background-color: #ff3d3d;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sell-button:hover {
            background-color: #d32f2f;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 30px); /* Adjusts to 2 cards per row on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .card {
                flex: 1 1 100%; /* Stacks cards vertically on very small screens */
            }
        }
    </style>
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
        <!-- <div id="mainContainerujjal"> -->
            <div class="containerujjal">
                <!-- Fixed Navigation Bar -->
                @include('user.nft_navebar')

                <!-- Scrollable Content Section -->
                <div class="scrollable-content">
                    <!-- Header -->
                    <div class="header">NFT MARKET</div>

                    <!-- Navigation Tabs -->
                    <div class="nav-tabs">
                        <div>POLYGON NFT</div>
                        <div>ART</div>
                        <div>COLLECTIVES</div>
                    </div>

                    <!-- Scrollable Cards Container -->
                    <div class="cards-container">
                        <!-- NFT Card 1 -->
                        @foreach ($market as $mk)
                        <div class="card">
                            <img src="{{ asset('captcha_photo/dragon.jpg') }}" alt="NFT Image">
                            <div class="nft-code">PD-{{ $mk->nft_code }}</div>
                            <input type="text" class="price-field" value="{{ $mk->price }}" readonly>
                            <button class="sell-button">BUY NOW</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        <!-- </div> -->
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
