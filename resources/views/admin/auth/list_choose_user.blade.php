@extends('admin.layouts.master')
@section('title', 'KidKinder | List Choose User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="dropdown mb-3">
                    <a class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Əməliyyatlar
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="delete_choose_users" href="#">Seçilmişləri sil</a>
                        <a class="dropdown-item" id="come_back_users" href="#">Seçilmişləri qaytar</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Seç</th>
                            <th scope="col">Sıra</th>
                            <th scope="col">Şəkil</th>
                            <th scope="col">Ad, Soyad</th>
                            <th scope="col">Yaranma tarixi</th>
                            <th scope="col">Yenilənmə tarixi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delete_users as $k => $user)
                        <tr id="row{{$user->id}}" data-id="{{$user->id}}">
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" name="user_back[]" value="{{$user->id}}">
                                </div>
                            </td>
                            <td>{{$k + 1}}</td>
                            <td>
                                @if(isset($user->image))
                                    <img src="{{asset('storage/uploads/' . $user->image)}}" alt="image" width="100" height="100">
                                @else
                                    <img src="https://paddlesteamers.org/wp-content/uploads/2018/01/profile-unknown-male.jpg" alt="image" width="100" height="100">
                                @endif
                            </td>
                            <td>{{$user->name}} {{$user->surname}}</td>
                            <td><span class="badge badge-secondary">{{$user->getDate($user->created_at)}}</span></td>
                            <td><span class="badge badge-warning">{{$user->getDate($user->updated_at)}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="javascript:void(0)" class="btn btn-outline-success" id="select_all_users">Hamısını seç</a> &nbsp;
                <a href="javascript:void(0)" class="btn btn-outline-danger" id="cancel">Ləğv et</a>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'Silinmiş istifadəçilər')
@section('next_page', 'İstifdəçilərin siyahısı')
@section('current_page', 'Silinmiş İstifadəçilər')
@section('js')
    <script>
        $(function(){
            $("#come_back_users").click(function(e){
                e.preventDefault();
                var count = [];
                
                $('input[name="user_back[]"]:checked').each(function(i){
                    count[i] = $(this).length;
                    console.log(count);
                });
                if(count != 0){
                    
                    Swal.fire({
                        title: 'Geri qaytarmaq istədiyinizdən əminsiniz?',
                        text: "Bu zaman bütün silinmiş istifadəçilər geri qaytarılacaqdır!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Bəli, qaytarılsın!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var back = [];
                            var url = '{{route('come.back.user')}}';
                            $('input[name="user_back[]"]:checked').each(function(i){
                            back[i] = $(this).val();
                            });
                            $.post(url, {ids: back}, function(data){
                                Swal.fire(
                                'Uğurlu!',
                                'Məlumatlar uğurla geri qaytarıldı.',
                                'success'
                                )
                                setInterval('location.reload()', 3000);
                                //console.log(data.message);
                            });
                            
                        }
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Xəta',
                        text: 'Heç bir element təyin edilməmişdir!',
                        })
                } 
            });
            $("#delete_choose_users").click(function(e){
                e.preventDefault();
                var count = [];
                $('input[name="user_back[]"]:checked').each(function(i){
                    count[i] = $(this).length;
                });
                if(count != 0){
                    Swal.fire({
                        title: 'Silmək istədiyinizdən əminsiniz?',
                        text: "Sildiyin təqdirdə geri dönüş mümkün olmayacaqdır!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Bəli, silinsin!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var url = '{{route('destroy.choose.users')}}';
                            var ids = [];
                            $('input[name="user_back[]"]:checked').each(function(i){
                                ids[i] = $(this).val();
                            });
                            $.ajax({
                                method: "POST",
                                url: url,
                                data: {ids: ids},
                                success: function(response){
                                    console.log(response);
                                }
                            })
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            setInterval('location.reload()', 3000);
                        }
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Xəta',
                        text: 'Heç bir element təyin edilməmişdir!',
                        })
                }
            });
            $("#select_all_users").on("click", function(e){
                e.preventDefault();
                $('input[name="user_back[]"]').prop("checked", true);
            });
            $("#cancel").on("click", function(e){
                e.preventDefault();
                $('input[name="user_back[]"]').prop("checked", false);
            });
            
        });
    </script>
@endsection