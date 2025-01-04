{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full"
        type="password"
        name="password"
        required autocomplete="new-password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-text-input id="password_confirmation" class="block mt-1 w-full"
        type="password"
        name="password_confirmation" required autocomplete="new-password" />

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-primary-button class="ms-4">
        {{ __('Register') }}
    </x-primary-button>
</div>
</form>
</x-guest-layout> --}}



<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Passive Factory | Registration</title>
    <meta name="description" content="Passive Factory | Registration">
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
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <!--<div class="right">-->
        <!--    <a href="{{ url('/login') }}" class="headerButton">-->
        <!--        Login-->
        <!--    </a>-->
        <!--</div>-->
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
        </div>
        <div class="section mb-5 p-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="name">name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Your e-mail" name="email" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="mobile">Mobile</label>
                                <input type="mobile" class="form-control" id="mobile" placeholder="Your Mobile" name="mobile" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="ref_code">Referal Code</label>
                                <input type="ref_code" class="form-control" id="ref_code" placeholder="Your Referal Code" name="ref_code">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <input type="password" class="form-control" id="password" autocomplete="off"
                                    placeholder="Your password" name="password" style="display: none">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <input type="password" class="form-control" id="password_confirmation" autocomplete="off"
                                    placeholder="Type password again" name="password_confirmation" style="display: none">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-links mt-2">
                    <div>
                        Already Have an account? <a href="{{ url('/login') }}"> Login</a>
                    </div>
                </div>

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" id="generate-password">Register</button>
                </div>
            </form>
        </div>

    </div>
    <!-- * App Capsule -->


    <!-- Terms Modal -->

    <!-- * Terms Modal -->

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{ asset('fine-app/assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{ asset('finr-app/assets/js/plugins/splide/splide.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('fine-app/assets/js/base.js') }}"></script>
    <!-- Add a button to trigger password generation -->

    <script>
        // Function to generate a strong password
        function generateStrongPassword(length = 16) {
            const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const lowerCase = 'abcdefghijklmnopqrstuvwxyz';
            const numbers = '0123456789';
            const symbols = '!@#$%^&*()_+-=[]{}|;:,<.>?/';

            const allCharacters = upperCase + lowerCase + numbers + symbols;

            let password = '';
            for (let i = 0; i < length; i++) {
                password += allCharacters.charAt(Math.floor(Math.random() * allCharacters.length));
            }

            return password;
        }

        // Function to fill both password fields with the generated password
        function setGeneratedPassword() {
            const password = generateStrongPassword(); // Generate a strong password

            // Set the generated password to both fields
            document.getElementById('password').value = password;
            document.getElementById('password_confirmation').value = password;
        }

        // Event listener for the button click to generate the password
        document.getElementById('generate-password').addEventListener('click', function() {
            setGeneratedPassword();
        });
    </script>
</body>

</html>