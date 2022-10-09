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
                        <a class="dropdown-item" href="#">Hamısını sil</a>
                        <a class="dropdown-item" id="delete_choose_user" href="#">Seçilmişləri sil</a>
                        <a class="dropdown-item" id="delete_choose_user" href="#">Seçilmişləri qaytar</a>
                        <a class="dropdown-item" id="delete_choose_user" href="#">Hamısını qaytar</a>
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
                        <tr>
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
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'Silinmiş istifadəçilər')
@section('next_page', 'İstifdəçilərin siyahısı')
@section('current_page', 'Silinmiş İstifadəçilər')