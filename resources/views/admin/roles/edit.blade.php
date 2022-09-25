@extends('admin.layouts.master')
@section('title', 'KidKinder | Roles')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    @csrf
                    <div id="error_message"></div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="name" value="{{$role->name}}" data-id="{{$role->id}}" id="name" placeholder="Name">
                    </div>
                    <button type="button" class="btn btn-success" id="btnRole">Yenilə</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'İstifadəçi rolunu yeniləmək')
@section('next_page', 'İstifadəçi rolları')
@section('current_page', 'İstifadəçi rolunu yeniləmək')
@section('js')
    <script>
        $(function(){
            $("#btnRole").click(function(e){
                e.preventDefault();
                var name = $("#name").val();
                var id = $("#name").data("id");
                var url = '{{route('roles.update')}}';
                if(name == ""){
                    $("#error_message").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"+"Forma dəyər girməyiniz tələb olunur!"+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                }else{
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            id: id,
                            name: name,
                        },
                        success: function(response){
                            $("#error_message").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>"+response.message+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                        }
                    })
                }
            });
        });
    </script>
@endsection
