<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::where('view', 1)->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function store(Request $request){
        try{
            $name = $request->name;
            Role::create(['name' => $name]);
            return response()->json(['message' => 'Melumat uğurla gondərildi!', 'status' => 'success'], 200);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function edit($id){
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }
    public function update(Request $request){
        try{
            $id = $request->id;
            $name = $request->name;
            $role = Role::where('id', $id)->firstOrFail();
            $role->name = $name;
            $role->save();
            return response()->json(['message' => 'Məlumat uğurla yeniləndi'], 200);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    public function destroy(Request $request){
        $id = $request->id;
        Role::where("id", $id)->firstOrFail()->delete();
        return response()->json(['message' => 'Uqurla silindi', 'status' => 'success'],200);
    }
}
