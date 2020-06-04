@extends("templates/account")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Change Password</h1>

    <div class="row">
        <div class="col-lg-8">
            <form class="user" method="POST" action="<?= url('account/changepassword');  ?>">
                @csrf
                <div class="form-group row">
                    <label for="current_password" class="col-sm-3 col-form-label">Current password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control-user" id="current_password" name="currentPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password1" class="col-sm-3 col-form-label">New password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-3 col-form-label">Repeat new password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2">
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">
                            Change Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection