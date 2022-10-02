@extends('admin.layouts.master')
@section('title', 'KidKinder | User list')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Say</th>
                        <th scope="col">Şəkil</th>
                        <th scope="col">Ad, Soyad</th>
                        <th scope="col">Yaranma tarixi</th>
                        <th scope="col">Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $k => $user)
                        <tr>
                        <th scope="row">{{$k + 1}}</th>
                        <td>
                        @if(isset($user->image))
                            <img src="{{asset('storage/uploads/' . $user->image)}}" alt="image" width="100" height="100">
                        @else
                            <img src="{{asset('storage/uploads/man-person.jpg')}}" alt="image" width="100" height="100">
                        @endif
                        </td>
                        <td>{{$user->name}} {{$user->surname}}</td>
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
                                                <img src="{{asset('storage/uploads/man-person.jpg')}}" alt="image" width="100" height="100">
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
                            <a href="" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></a> &nbsp;
                            <a href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('dashboard', 'İstifadəçi siyahısı')
@section('next_page', 'Əsas')
@section('current_page', 'İstidaçi siyahısı')