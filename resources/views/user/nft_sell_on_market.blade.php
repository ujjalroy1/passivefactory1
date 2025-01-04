<!doctype html>
<html lang="en">

<head>
       @include('user.css')
       @include('user.nft_css')
       <style type="text/css">
        
        .collections-containerujjal {
          width: 100%;
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 15px;
          max-height: 500px; 
          overflow-y: auto; 
        }
    
        
        .collection-cardujjal {
          display: flex;
          flex-direction: column;
          align-items: center;
          width: 300px;
          background: linear-gradient(90deg, #7e57c2, #64b5f6);
          padding: 20px;
          border-radius: 10px;
          color: #fff;
          font-family: Arial, sans-serif;
        }
    
       
        .nft-codeujjal {
          font-size: 1.2em;
          font-weight: bold;
          margin-bottom: 10px;
        }
    
        
        .collection-price-containerujjal {
          display: flex;
          align-items: center;
          margin-bottom: 10px;
        }
    
        .currency-iconujjal {
          width: 18px;
          height: 18px;
          margin-right: 5px;
        }
    
   
        .collection-imageujjal {
          width: 80px;
          height: 80px;
          border-radius: 8px;
          background-color: #fff;
          padding: 5px;
          margin-bottom: 15px;
        }
    
       
        .stake-priceujjal {
          width: 100%;
          padding: 8px;
          border: none;
          border-radius: 5px;
          text-align: center;
          font-size: 1em;
          font-weight: bold;
          color: #fff;
          background-color: #ff3d3d;
          margin-bottom: 10px;
          cursor: pointer;
        }
    
       
        .stake-buttonujjal {
          width: 60%;
          background-color: #ff3d3d;
          color: #fff;
          border: none;
          padding: 8px;
          border-radius: 20px;
          font-size: 1em;
          font-weight: bold;
          cursor: pointer;
          transition: background-color 0.3s;
        }
    
        .stake-buttonujjal:hover {
          background-color: #d32f2f;
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

            <div class="collections-containerujjal">
               
                   <!-- Collection Card -->
                   @foreach ($myasset as $ms)


                   <div class="collection-cardujjal">
                    
                    <div class="nft-codeujjal">PD-{{ $ms->nft_code }}</div>
                    <div class="collection-price-containerujjal">
                      <img class="currency-iconujjal" src="https://img.icons8.com/color/48/000000/ethereum.png" alt="Currency Icon">
                      <span>{{ $ms->price }}</span>



                      </div>
                      <form action="{{ url('sellnft',$ms->id) }}" method="POST">
                        @csrf
                        
                      <img class="collection-imageujjal" src="{{ asset('captcha_photo/dragon.jpg') }}" alt="NFT Image">
                      <input type="text" class="stake-priceujjal" value="{{ $ms->price+$ms->eroi }}" name="price">
                      <input type="submit" class="stake-buttonujjal" value="Sell On Market">
                    </form>
                    </div>



                     
                  @endforeach
               
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
