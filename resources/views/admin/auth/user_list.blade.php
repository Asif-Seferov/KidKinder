@extends('admin.layouts.master')
@section('title', 'KidKinder | User list')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="dropdown mb-3">
                <a class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Əməliyyatlar
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Hamısını sil</a>
                    <a class="dropdown-item" id="delete_choose_user" href="#">Seçilmişləri sil</a>
                    @if(count($view))
                        <a class="dropdown-item" href="{{route('list.choose.user')}}">Silinmiş elementlər</a>
                    @endif
                </div>
            </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sil</th>
                        <th scope="col">Say</th>
                        <th scope="col">Şəkil</th>
                        <th scope="col">Ad, Soyad</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Yaranma tarixi</th>
                        <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $k => $user)
                        <tr id="row{{$user->id}}">
                        <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" name="user_delete[]" value="{{$user->id}}">
                        </div>
                        </td>
                        <th scope="row">{{$k + 1}}</th>
                        <td>
                        @if(isset($user->image))
                            <img src="{{asset('storage/uploads/' . $user->image)}}" alt="image" width="100" height="100">
                        @else
                            <img src="https://paddlesteamers.org/wp-content/uploads/2018/01/profile-unknown-male.jpg" alt="image" width="100" height="100">
                        @endif
                        </td>
                        <td>{{$user->name}} {{$user->surname}}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{$role->name}}
                            @endforeach
                        </td>
                        <td><span class="badge badge-secondary">{{$user->getDate($user->created_at)}}</span></td>
                        <td>
                            <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#userModal{{$user->id}}">
                                <i class="fas fa-eye"></i>
                            </a> &nbsp;
                            <!-- Modal -->
                            <div class="modal fade" id="userModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">İstifadəçi məlumatları</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>
                                            Şəkil: &nbsp;&nbsp; 
                                            @if(isset($user->image))
                                                <img src="{{asset('storage/uploads/' . $user->image)}}" alt="image" width="100" height="100">
                                            @else
                                                <img src="https://paddlesteamers.org/wp-content/uploads/2018/01/profile-unknown-male.jpg" alt="image" width="100" height="100">
                                            @endif
                                        </h5>
                                        <h5>Ad, Soyad: <small>{{$user->name}} {{$user->surname}}</small></h5> 
                                        <h5>Email: <small>{{$user->email}}</small></h5>
                                        <h5>Yaranma tarixi: <small class="badge badge-secondary">{{$user->getDate($user->created_at)}}</small></h5> 
                                        <h5>Yenilənmə tarixi: <small class="badge badge-warning">{{$user->getDate($user->updated_at)}}</small></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bağla</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('edit.user', $user->id)}}" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></a> &nbsp;
                            <a href="javascript:void(0)" class="btn btn-outline-danger delete-user" data-id="{{$user->id}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span style="float: right;">{{ $users->links() }}</span>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'İstifadəçi siyahısı')
@section('next_page', 'Əsas')
@section('current_page', 'İstidaçi siyahısı')
@section('js')
    <script>
        $(function(){
            $(".delete-user").click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{route('delete.user')}}';
                var column = $("#row"+id);
                Swal.fire({
                    title: 'Silmək istədiyinizdən əminsiniz?',
                    text: "Silinən istifadəçiləri geri qaytarmaq mümkün olmayacaqdır!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bəli, silinsin!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: url,
                            data: {id: id},
                            success: function(response){
                                Swal.fire(
                                'Silindi!',
                                'İstifadəçilər uğurla silindi.',
                                'success'
                                )
                                column.remove();
                            }
                        });
                    }
                    })
                });

            $("#delete_choose_user").click(function(e){
                e.preventDefault();
                //var id = $("input[name=checkbox]:checked").val();
                
                var url = '{{route('delete.choose.user')}}';
                var check = [];
                $('input[name="user_delete[]"]:checked').each(function(i){
                    check[i] = $(this).length; 
                });
                if(check != 0){
                    Swal.fire({
                        title: 'Silmək istədiyinizdən əminsiniz?',
                        text: "Təsdiqlədiyiniz zaman istifadəçilər silinəcəkdir!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Bəli, silinsin!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            var ids = [];
                            $('input[name="user_delete[]" ]:checked').each(function(i){
                                ids[i] = $(this).val();  
                            });
                                $.post(url, {ids: ids}, function(data){
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                                    setInterval('location.reload()', 3000);
                                });
                            }
                        })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Xəta',
                        text: 'Silmək üçün element təyin olunmamışdır!',
                    })
                }   
            });
        });
    </script>
@endsection