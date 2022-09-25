@extends('admin.layouts.master')
@section('title', 'KidKinder | Roles')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post">
                    @csrf
                    <div id="error_message"></div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <button type="button" class="btn btn-success" id="btnRole">Yarat</button>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sıra</th>
                        <th scope="col">Ad</th>
                        <th scope="col">Yaranma Tarixi</th>
                        <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $k => $role)
                            <tr id="row{{$role->id}}">
                            <th scope="row">{{$k + 1}}</th>
                            <td>{{$role->name}}</td>
                            <td><span class="badge badge-secondary">{{Carbon\Carbon::parse($role->created_at)->diffForHumans()}}</span></td>
                            <td>
                                <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-primary">edit</a> &nbsp;
                                <a href="javascript:void(0)" class="btn btn-outline-danger delete-role" data-id="{{$role->id}}">delete</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'İstifadəçi rolları')
@section('next_page', 'İstifadəçilər')
@section('current_page', 'İstifadəçi rolları')
@section('js')
    <script>
        $(function(){
            $("#btnRole").click(function (e) {
                e.preventDefault();
                var name = $("#name").val();
                var url = '{{route('roles.store')}}'
                if(name == ""){
                    $("#error_message").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"+"Forma dəyər girməyiniz tələb olunur!"+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                }else{
                    $.post(url, {name: name}, function(data){
                        $("#error_message").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>"+data.message+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                        setInterval('location.reload()', 5000);
                    });
                }
            });
            $(".delete-role").click(function(e){
                var id = $(this).data('id');
                var url = '{{route('roles.destroy')}}';
                Swal.fire({
                    title: 'Silmək istədiyinizdən əminsiniz?',
                    text: "Sildikdən sonra məlumatları geri qaytarmaq mümkün olmuyacaq!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bəli, Davam edirəm!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.post(url, {id: id}, function(data){
                            Swal.fire(
                            'Silindi!',
                            'Məlumatlar uğurla silindi',
                            'success'
                            )
                            $("#row"+id).remove();
                            console.log(data.message);
                        });
                        
                    }
                })
            });
        });
    </script>
@endsection
