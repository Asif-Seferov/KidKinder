@extends("admin.layouts.master")
@section('title', 'KidKinder | Register')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="surname" placeholder="Surname">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control">
                            <option>Default select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                    </div>
                    <button type="button" class="btn btn-success">Qeydiyyatdan keç</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'Qeydiyyat Formu')
@section('next_page', 'Login Form')
@section('current_page', 'Qeydiyyat')