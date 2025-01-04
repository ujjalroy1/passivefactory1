<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      
        .form-container-ujjal {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
        }
        .form-container-ujjal label {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }
        .form-container-ujjal input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-container-ujjal input[type="text"]:focus {
            border-color: #42a5f5;
            outline: none;
        }
        .form-container-ujjal input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #42a5f5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container-ujjal input[type="submit"]:hover {
            background-color: #1e88e5;
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



            <div class="form-container-ujjal">

                <form action="{{ url('admin/storeAddProject') }}" method="POST">
                    @csrf
                    <label for="name">Add Your Project</label>
                    <input type="text" id="name" name="name" placeholder="Project Name">
                    <input type="submit" value="Add">
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