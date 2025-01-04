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
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


#container-ujjal {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

#team-box-ujjal {
    width: 320px;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    text-align: center;
}

#header-ujjal {
    background: linear-gradient(45deg, #6ac1a5, #458764);
    padding: 15px;
    color: white;
    font-size: 18px;
    font-weight: bold;
}

.level-title-ujjal {
    background-color: #e0e0e0;
    padding: 10px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.member-row-ujjal {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
}

.member-name-ujjal {
    font-size: 16px;
    font-weight: 500;
}

.details-btn-ujjal {
    padding: 5px 10px;
    background-color: #38b673;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}

.details-btn-ujjal:hover {
    background-color: #2f9e5c;
}

#level1-ujjal .member-row-ujjal {
    background-color: #c7e8d5;
}

#level2-ujjal .member-row-ujjal {
    background-color: #f3b8b8;
}

#level3-ujjal .member-row-ujjal {
    background-color: #f3b8b8;
}

.see-more-ujjal {
    padding: 10px;
    color: #0073e6;
    cursor: pointer;
}

#referral-section-ujjal {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: #ffd580;
}

#referral-link-ujjal {
    width: 75%;
    padding: 5px;
    border: none;
    background-color: #fff;
    font-size: 14px;
}

#copy-btn-ujjal {
    padding: 5px 10px;
    background-color: #ff7b54;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 5px;
}

#copy-btn-ujjal:hover {
    background-color: #ff6a3c;
}

        </style>


<div id="container-ujjal">
    <div id="team-box-ujjal">
        <div id="header-ujjal">My Team</div>
        
        @if ($id==1)

        <div id="level1-ujjal">
            <div class="level-title-ujjal">Level 1</div>

            @foreach ($level1 as $lv1 )
                

            <form action="{{ url('myTeamDetails',$lv1) }}" method="POST">
                @csrf
                <div class="member-row-ujjal">
                    <span class="member-name-ujjal">{{ $lv1 }}</span>
                    {{-- <button class="details-btn-ujjal">Details</button> --}}
                    <input type="submit" value="Details" class="details-btn-ujjal">
                </div>
                
            </form>

                                         
            @endforeach



        </div>
            
        @endif
       @if ($id==2)

       <div id="level2-ujjal">
        <div class="level-title-ujjal">Level 2</div>
        @foreach ($level2 as $lv2)

        <form action="{{ url('myTeamDetails',$lv2) }}" method="POST">
            @csrf
            <div class="member-row-ujjal">
                <span class="member-name-ujjal">{{ $lv2 }}</span>
                <input type="submit" value="Details" class="details-btn-ujjal">
            </div>

        </form>

            
        @endforeach


        
    </div>
           
       @endif

        @if ($id==3)
        <div id="level3-ujjal">
            <div class="level-title-ujjal">Level 3</div>
            @foreach ($level3 as $lv3)

             <form action="{{ url('myTeamDetails',$lv3) }}" method="POST">
                @csrf
                <div class="member-row-ujjal">
                    <span class="member-name-ujjal">{{ $lv3 }}</span>
                    <input type="submit" value="Details" class="details-btn-ujjal">
                </div>

             </form>

                
            @endforeach
            

        </div>
        
        @endif




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