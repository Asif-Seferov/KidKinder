@extends("admin.layouts.master")
@section('title', 'KidKinder | Register')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('register.store')}}" method="post" id="register_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                        @error('file')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" value="{{old('firstname')}}" placeholder="Firstname">
                        @error('firstname')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname" value="{{old('surname')}}" placeholder="Surname">
                        @error('surname')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control" name="role">
                            <option>İstifadəçi rolu seçin</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        @error('password')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password">
                        @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-success">Qeydiyyatdan keç</button> &nbsp;
                    <button type="button" class="btn btn-outline-danger" id="btnCancel">Ləğv et</button>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'Qeydiyyat Formu')
@section('next_page', 'Login Form')
@section('current_page', 'Qeydiyyat')
@section('js')
    <script>
        $(function(){
            $("#btnCancel").click(function(e){
                e.preventDefault();
                var firstname = $("#firstname").val();
                var surname = $("#surname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var password_confirmation = $("#password_confirmation").val();
                if(firstname != ""){
                    $("#register_form")[0].reset();
                }
            });
        });
    </script>
@endsection