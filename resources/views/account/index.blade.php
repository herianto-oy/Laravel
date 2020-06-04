@extends("templates/account")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="card mb-3" style="max-width: 540px;">
        @if (session('notif'))
        <div class="alert alert-success" role="alert">
            {{ session('notif') }}
        </div>
        @endif
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= asset('storage/profile/' . $account['0']->image); ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $account[0]->name ?></h5>
                    <p class="card-text"><?= $account[0]->email ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= $account[0]->created_at; ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection