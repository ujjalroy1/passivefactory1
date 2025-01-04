<!doctype html>
<html lang="en">

<head>
       @include('user.css')
       @include('user.nft_css')
       <style type="text/css">
   
        .contentujjal {
          display: flex;
          justify-content: center; /* Centers the collections container horizontally */
          padding-top: 20px;
        }

        .collections-containerujjal {
          width: 300px;
          text-align: left;
          margin: 0 auto; /* Centers the container */
        }
    
        .collections-titleujjal {
          font-size: 1.2em;
          font-weight: bold;
          margin-bottom: 10px;
        }
    
        .collection-cardujjal {
          display: flex;
          align-items: center;
          justify-content: space-between;
          background: linear-gradient(90deg, #7e57c2, #64b5f6);
          padding: 15px;
          border-radius: 10px;
          color: #fff;
          margin-bottom: 10px;
          position: relative;
        }
    
        .collection-infoujjal {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
        }
    
        .collection-infoujjal .nft-codeujjal {
          font-weight: bold;
        }
    
        .collection-priceujjal {
          display: flex;
          align-items: center;
          margin-top: 5px;
          font-size: 1.1em;
        }
    
        .currency-iconujjal {
          width: 18px;
          height: 18px;
          margin-right: 5px;
        }
    
        .collection-imageujjal {
          width: 60px;
          height: 60px;
          border-radius: 8px;
          background-color: #fff;
          padding: 5px;
        }
    
        .see-allujjal {
          text-align: right;
          font-size: 1em;
          font-weight: bold;
          cursor: pointer;
          color: #333;
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

        <div id="mainContainerujjal">
        <div class="containerujjal">
            <!-- Fixed Navigation Bar -->
              @include('user.nft_navebar')
    
            <!-- Scrollable Content Section -->
            <div class="contentujjal">
                
                <div class="collections-containerujjal">
                    <div class="collections-titleujjal">My Collections</div>
                  
                    <!-- Collection Cards -->
                    @foreach ($myasset as $ms)
                    <div class="collection-cardujjal">
                        <div class="collection-infoujjal">
                          <span class="nft-codeujjal">PD-{{ $ms->nft_code }}</span>
                          <div class="collection-priceujjal">
                            <img class="currency-iconujjal" src="https://img.icons8.com/color/48/000000/ethereum.png" alt="Currency Icon">
                            {{ $ms->price }}
                          </div>
                        </div>
                        <img class="collection-imageujjal" src="{{ asset('captcha_photo/dragon.jpg') }}" alt="NFT Image">
                      </div>
                    @endforeach
                    
                </div>

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
