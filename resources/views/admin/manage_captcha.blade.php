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
           {{-- //here is the code for this page --}}
        
           <div class="container mt-5">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 20%;">Title</th>
                            <th style="width: 10%;">Captcha</th>
                            
                            <th style="width: 15%;">Image</th>
                            <th style="width: 15%;">Edit</th>
                            <th style="width: 15%;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($captcha as $cap)
                        <tr>
                            <td>{{ $cap->title }}</td>
                            <td>{{ $cap->code }}</td>
                          
                            <td>
                                <img src="/captcha_photo/{{ $cap->image }}" class="img-fluid rounded" style="height: 70px; width: 70px;">
                            </td>
                            <td>
                                <a href="{{ url('admin/editCaptcha', $cap->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/deleteCaptcha',$cap->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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