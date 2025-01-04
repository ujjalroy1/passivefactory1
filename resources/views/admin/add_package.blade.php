<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            {{-- //write main code here --}}
            <div class="container mt-5">
              <form action="{{ url('admin/uploadPackage') }}" method="POST">
                  @csrf
                
                  <div class="mb-3">
                      <label for="name" class="form-label">Package Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter package name">
                  </div>
          
                 
                  <div class="mb-3">
                      <label for="price" class="form-label">Package Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter package price">
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Captcha Price</label>
                    <input type="text" class="form-control" id="cpprice" name="cpprice" placeholder="Enter captcha price">
                </div>
          
                  
                  <div class="mb-3">
                      <label for="benefit" class="form-label">Package Benefit</label>
                      <textarea class="form-control" id="benefit" name="benifit" rows="4" placeholder="Enter benefit"></textarea>
                  </div>
          
                  <!-- Submit Button -->
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Add</button>
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