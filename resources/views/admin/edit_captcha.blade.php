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
            

            <div class="container mt-5">
                <form class="bg-light p-4 rounded shadow-lg" action="{{ url('admin/uploadEditCaptcha',$captcha) }}" method="POST" enctype="multipart/form-data">
                   
                    @csrf
                  
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $captcha->title }}">
                    </div>
            
                    <div class="mb-3">
                        <label for="image" class="form-label">Current Image</label>
                        <img src="/captcha_photo/{{ $captcha->image }}" height="70px" width="70px">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">New Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
            
                
                    <div class="mb-3">
                        <label for="captcha" class="form-label">Captcha</label>
                        <input type="text" class="form-control" id="captcha" name="captcha" value="{{ $captcha->code }}">
                    </div>
            
                 
                    {{-- <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $captcha->price }}">
                    </div> --}}
            
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
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