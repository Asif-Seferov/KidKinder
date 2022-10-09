@extends('admin.layouts.master')
@section('title', 'KidKinder | Edit User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action="{{route('upload.user', $user->id)}}" method="post" id="userUpload" enctype="multipart/form-data">
                    @csrf
                    <div class="form-gorup mb-3">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-gorup mb-3">
                        <input type="text" name="firstname" id="name" class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-gorup mb-3">
                        <input type="text" name="surname" class="form-control" value="{{$user->surname}}">
                    </div>
                    <div class="form-gorup mb-3">
                        <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group mb-3">
                        <select name="role" class="form-control">
                            <option>İstifadəçi rolu seçin</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$user->hasRole($role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-outline-success">Yenilə</button>
                    <button type="button" class="btn btn-outline-danger" id="resetBtn">Ləğv et</button>
                </form>
            </div>
            <div class="col-6">
                @if(isset($user->image))
                    <p class="text-center"><img src="{{asset('storage/uploads/' . $user->image)}}" alt="image" width="100" height="100"></p>
                @else
                    <p class="text-center"><img src="https://paddlesteamers.org/wp-content/uploads/2018/01/profile-unknown-male.jpg" alt="image" width="100" height="100"></p>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'İstifadəçi yenilənməsi')
@section('next_page', 'İstifadəçilər')
@section('current_page', 'İstifadəçi yenilənməsi')
@section('js')
    <script>
        $(function(){
            $("#resetBtn").click(function(e){
                e.preventDefault();
                $("#userUpload")[0].reset();
            });
        });
    </script>
@endsection