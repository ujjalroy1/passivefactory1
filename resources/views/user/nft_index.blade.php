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
        @include('user.nft_navebar')

        @if($nftinfo != null)
        <div class="contentujjal">
            <div class="suggestions-headerujjal">
                <p class="textujjal">SUGGESTIONS</p>
                @if(isset($nftinfo->nft_code))
                <p class="idujjal">PD-{{ $nftinfo->nft_code }}</p>
                @endif
                <div class="priceujjal">
                    @if(isset($nftinfo->price))
                    <p>Price : {{ $nftinfo->price }}</p>
                    @endif
                </div>
            </div>

            <div class="nft-imageujjal">
                <img src="{{ asset('captcha_photo/dragon.jpg') }}" alt="NFT Image" height="250px" width="100px">
            </div>

            <form action="{{ url('buyNFT',$user->id) }}" method="POST">
                @csrf

                <div class="info-sectionujjal">
                    @if(isset($nftinfo->eroi))
                    <p>E ROI - {{ $nftinfo->eroi }}</p>
                    @endif
                    <p>STAKE DURATION</p>
                    @if(isset($nftinfo->duration))
                    <p>{{ $nftinfo->duration }} DAYS</p>
                    @endif
                    <!-- <button class="buy-nowujjal">BUY NOW</button> -->
                    <input type="submit" value="BUY NOW" class="buy-nowujjal">
                </div>
            </form>
        </div>
        @else
        <div>
            <h1>NFT is Null</h1>
        </div>
        @endif
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