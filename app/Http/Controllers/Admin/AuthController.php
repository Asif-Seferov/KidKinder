<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;


class AuthController extends Controller
{
    public function user_list(){
        $users = User::all();
        return view('admin.auth.user_list', compact('users'));
    }
    public function register_form(){
        $roles = Role::all();
        return view("admin.auth.register_form", compact('roles'));
    }
    public function register_store(RegisterRequest $request){
        try{
            $email = $request->email;
            $file = $request->file;
            if($request->file != null){
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $explode = explode(".", $fileName, 1);
                $fileName = $explode[0] . "_" . now()->format("d-m-Y_H-i-s") . "." . $fileExtension;
                $path = "public/uploads/";
                Storage::putFileAs($path, $file, $fileName);
            }
                $user = new User();
                $user->name = $request->firstname;
                $user->surname = $request->surname;
                $user->email = $email;
                $user->password = Hash::make($request->password);
                $user->image = $file ? $fileName : null;
                $user->save();
                if($request->role != null){
                    $user->syncRoles($request->role);
                }
                
                Alert::success('Uğurlu', 'Qeydiyyatdan keçdiniz');
                return redirect()->back(); 
            }catch(\Exception $e){
                echo $e->getMessage();
            }
    }
}
