<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <img src="{{ asset('fine-app/assets/img/logo1.jpg') }}" alt="logo" class="logo">
    </div>
    <div class="right">

        @if (Route::has('login'))
        @auth
        <div class="container">
            <label>Your User ID</label>
            <div class="input-group">
                <!-- Display the dynamic account ID from the controller -->
                <input type="text" id="userId" value="{{ $account_id }}" disabled>
                <button onclick="copyToClipboard()">Copy</button>
            </div>
            <div class="message" id="copyMessage" style="display: none">ID Copied to Clipboard!</div>
        </div>
        @endauth
            
        @endif

        
        <a href="#" class="headerButton">
            <ion-icon class="icon" name="notifications-outline"></ion-icon>
            <span class="badge badge-danger"></span>
        </a>
        <a href="{{ asset('settings') }}" class="headerButton">
            <img src="{{ asset('fine-app/assets/img/sample/avatar/avatar1.jpg') }}" alt="image" class="imaged w32">
            
        </a>
    </div>
</div>


<script>
    function copyToClipboard() {
        // Get the value of the disabled input field
        var userIdValue = document.getElementById("userId").value;

        // Create a temporary input field to copy the value
        var tempInput = document.createElement("input");
        tempInput.style.position = "absolute";
        tempInput.style.left = "-9999px"; // Position it off-screen
        tempInput.value = userIdValue;

        // Append the input to the body, select its value, and copy it
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");

        // Remove the temporary input field
        document.body.removeChild(tempInput);

        // Show the "Copied" message
        var copyMessage = document.getElementById("copyMessage");
        copyMessage.style.display = "block";

        // Hide the message after 2 seconds
        setTimeout(function() {
            copyMessage.style.display = "none";
        }, 2000);
    }
</script>
