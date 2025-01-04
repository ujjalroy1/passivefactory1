<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Passive Factory</title>
    <meta name="description" content="Passive Factory">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="{{ asset('fine-app/assets/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fine-app/assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('fine-app/assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('fine-app/__manifest.json') }}">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="{{ asset('fine-app/assets/img/loading-icon.png') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Settings
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">0</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w100 rounded">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <div class="listview-title mt-1">Theme</div>
        <ul class="listview image-listview text inset no-line">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Dark Mode
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
                            <label class="form-check-label" for="darkmodeSwitch"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-1">Notifications</div>
        <ul class="listview image-listview text inset">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Payment Alert
                            <div class="text-muted">
                                Send notification when new payment received
                            </div>
                        </div>
                        <div class="form-check form-switch  ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
                            <label class="form-check-label" for="SwitchCheckDefault1"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Notification Sound</div>
                        <span class="text-primary">Beep</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-1">Profile Settings</div>
        <!-- <form class="max-w-lg mx-auto bg-white p-6 shadow-lg rounded-lg" action="{{ url('update_profile') }}" method="POST">
            @csrf
            <ul class="list-none">
                <li class="mb-4">
                    <div class="relative">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input name="name" type="text" id="name" value="{{ $user->name }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </li>
        
                <li class="mb-4">
                    <div class="relative">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input name="email" type="email" id="email" value="{{ $user->email }}" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </li>
        
                 <li class="mt-6">
                    <div class="relative">
                          <input type="submit" value="Save Changes" class="w-full bg-green-300 hover:bg-green-400 text-black font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    </div>
               </li>
            </ul>
        </form> -->
        

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2 inset">
           
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            2 Step Verification
                        </div>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
                            <label class="form-check-label" for="SwitchCheckDefault3"></label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Log out all devices</div>
                    </div>
                </a>
            </li>
        </ul>


    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    @include('user.app_bottom_menu')
    <!-- * App Bottom Menu -->

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset('fine-app/assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{ asset('fine-app/assets/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('fine-app/assets/js/base.js') }}"></script>


</body>

</html>