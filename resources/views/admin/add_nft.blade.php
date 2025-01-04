<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    margin-bottom: 8px;
    font-size: 14px;
    color: #333;
}

select,
input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #218838;
}

input[type="text"]:focus,
select:focus {
    border-color: #80bdff;
    outline: none;
}


    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           
            <div class="form-container">
                <form action="{{ url('admin/storeNFT') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Select Project Name</label>
                        <select class="form-control" name="project_name" id="project_name" required>
                            <option value="">Select any option</option>
                            @foreach ($project as $p)
                                <option value="{{ $p->project_name }}">{{ $p->project_name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="price">Enter Price</label>
                        <input class="form-control" type="text" name="price" id="price" placeholder="Enter price" required>
                    </div>
        
                    <div class="form-group">
                        <label for="eroi">Enter EROI</label>
                        <input class="form-control" type="text" name="eroi" id="eroi" placeholder="Enter EROI" required>
                    </div>
        
                    <div class="form-group">
                        <label for="duration">Enter Duration (Days)</label>
                        <input class="form-control" type="text" name="duration" id="duration" placeholder="Enter duration in days" required>
                    </div>
        
                    <div class="form-group">
                        <input type="submit" value="Add" class="submit-btn">
                        <!-- <button type="submit" class="form-control"> -->
                    </div>
                </form>
            </div>



          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>