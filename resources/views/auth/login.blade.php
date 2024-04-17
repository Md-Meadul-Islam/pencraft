<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In || PenCraft</title>
    <link rel="apple-touch-icon" href="{{asset('storage/photo')}}/apple-touch-icon.png">
    <link rel="icon" type="image/gif" href="{{asset('storage/photo')}}/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
</head>
<body>
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 d-flex flex-column align-items-center justify-content-center">
          <div class="d-flex justify-content-center py-4">
            <a href="{{route('post.index')}}" class="d-flex align-items-center w-auto" style="text-decoration: none">
              <img src="{{asset('storage/photo')}}/logo.png" width="50px" height="50px"><span class="d-lg-block" style="font-weight:800;font-size:36px;color:#81c408">PenCraft</span></a>
          </div><!-- End Logo -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Access to your Account!!</h5>
              </div>
              <form action="{{route('login')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="login" class="form-label"><strong>E-mail / Phone</strong></label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope"></i></span>
                    <input type="text" name="login" class="form-control" id="login" autocomplete="email" required>
                  </div>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label"><strong>Password</strong></label>
                  <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock-open"></i></span>
                    <input type="password" name="password" class="form-control" id="password" required
                      autocomplete="new-password">
                  </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Log-In</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0 float-end">Haven't Account? <a href="{{route('register')}}">Create New Account</a></p>
                  </div>
              </form>
            </div>
          </div>
          <div class="credits">
            Designed by <a href="https://www.blooms-ai.com">Blooms-AI</a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @dump(Session::get('errors'))
  @if($errors->any())
  @foreach($errors->all() as $error)
  <script>
    toastr.error("{{ addslashes($error) }}");
    toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

  </script>
  @endforeach
  @endif
  @if(Session::has('success'))
  <script>
    toastr.success("{{ Session::get('success') }}");
    toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
  @endif
</body>