@extends("templates/auth")

@section("title", "Login")

@section("content")
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                </div>
                @if (session('notif'))
                <div class="alert alert-success" role="alert">
                  {{ session('notif') }}
                </div>
                @endif
                @if (session('notiff'))
                <div class="alert alert-danger" role="alert">
                  {{ session('notiff') }}
                </div>
                @endif
                <form class="user" method="POST" action="<?= url('auth')  ?>">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= url('auth/registration'); ?>">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection