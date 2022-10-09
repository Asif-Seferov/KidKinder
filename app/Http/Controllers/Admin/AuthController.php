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
        $users = User::where('view', 1)->with('roles')->paginate(10);
        $view = User::where('view', 0)->get();
        return view('admin.auth.user_list', compact('users', 'view'));
    }
    public function register_form(){
        $roles = Role::all();
        return view("admin.auth.register_form", compact('roles'));
    }
    public function edit_user($id){
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('admin.auth.edit_user', compact('user', 'roles'));
    }
    public function upload_user(Request $request, $id){
       try{
            $user = User::find($id);
            $file = $request->file;
            if($request->file != null){
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $explode = explode(".", $fileName, 2);
                $fileName = $explode[0] . "_" . now()->format("d-m-Y_H-i-s") . "." . $fileExtension;
                $path = "public/uploads/";
                $deleteFile = "uploads/" . $user->image;
                Storage::disk('public')->delete($deleteFile);
                Storage::putFileAs($path, $file, $fileName);
            }
            $user->name = $request->firstname ? $request->firstname : $user->name;
            $user->surname = $request->surname ? $request->surname : $user->surname;
            $user->email = $request->email ? $request->email : $user->email;
            $user->password = $request->password ? $request->password : $user->password;
            $oldImage = $user->image;
            $user->image = $file ? $fileName : $oldImage;
            $user->syncRoles($request->role);
            $user->save();
            Alert::success('Uğurlu', 'Yeniləmə uğurla baş verdi!');
            return redirect()->back(); 
       }catch(\Exception $e){
           echo $e->getMessage();
       }
    }
    public function destroy(Request $request){
        try{
            $id = $request->id;
            $user = User::where('id', $id)->firstOrFail();
            $user->delete();
            return response()->json(['message' => 'İstifadəçilər uğurla silindi', 'status' => 'success'], 200);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function choose_delete(Request $request){
        try{
            $ids = $request->ids;
            foreach($ids as $id){
                $user = User::where('id', $id)->first();
                $user->view = $user->view ? 0 : 1;
                $user->save();
            }
            return response()->json(['message' => 'uqurla silindi', 'status' => 'success'], 200);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function list_choose_user(){
        $delete_users = User::where('view', 0)->get();
        return view('admin.auth.list_choose_user', compact('delete_users'));
    }
    public function register_store(RegisterRequest $request){
        try{
            $email = $request->email;
            $file = $request->file;
            if($request->file != null){
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $explode = explode(".", $fileName, 2);
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
