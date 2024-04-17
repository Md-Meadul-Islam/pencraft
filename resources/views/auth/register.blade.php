<!DOCTYPE html>
<html lang="en">
    
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register || PenCraft</title>
    <link rel="apple-touch-icon" href="{{asset('storage/photo')}}/apple-touch-icon.png">
    <link rel="icon" type="image/gif" href="{{asset('storage/photo')}}/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
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
                  <h5 class="card-title text-center pb-0 fs-4">Create A New Account</h5>
                </div>
                <form action="{{route('register')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12">
                    <label for="name" class="form-label"><strong>Name</strong><span style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-signature"></i></span>
                      <input type="text" name="name" class="form-control" id="name" required autofocus
                        autocomplete="name">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="nickname" class="form-label"><strong>Nick Name</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-signature"></i></span>
                      <input type="text" name="nickname" class="form-control" id="nickname" placeholder="This name shows on Feed...">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label"><strong>E-mail</strong><span
                        style="color:red; text-align:right">
                        *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-envelope"></i></span>
                      <input type="email" name="email" class="form-control" id="email" autocomplete="email" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="phone" class="form-label"><strong>Phone</strong><span style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                      <input type="text" name="phone" class="form-control" id="phone" autocomplete="phone">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="avater" class="form-label"><strong>Profile Photo</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-image"></i></span>
                      <input type="file" name="avater" class="form-control" id="avater">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="country" class="form-label"><strong>Country</strong></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-earth-asia"></i></span>
                      <input type="text" name="country" class="form-control" id="country">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label"><strong>New Password</strong><span style="color:red">
                        *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock-open"></i></span>
                      <input type="password" name="password" class="form-control" id="password" required
                        autocomplete="new-password">
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="password_confirmation" class="form-label"><strong>Confirm Password</strong><span
                        style="color:red"> *</span></label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-unlock"></i></span>
                      <input type="password" name="password_confirmation" class="form-control"
                        id="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="col-12">
                    <p style="color:red"> <strong>*</strong> marked fields are mandatory.</p>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Have an Account? <a href="{{route('login')}}" class="btn btn-sm btn-outline-success btn-warning">Log-In</a></p>
                  </div>
                </form>
              </div>
            </div>
            <div class="credits">
              Designed by <a href="https://www.meta.blooms-ai.com">Blooms-AI</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if(Session::has('errors'))
    @foreach(Session::get('errors') as $error)
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
</html>