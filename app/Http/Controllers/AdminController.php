<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Store(Request $request){
        $admin= new User();
        $admin->fname=$request->first_name;
        $admin->lname=$request->last_name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        $admin->image="placeholder.jpg";
        $admin->role="admin";
        $admin->status=1;
        $admin->phone="";
        $admin->address="";
        $admin->save();
        return redirect()->route('admins')->with('success', "admin added succesfully");
    }
    public function destroy($id){
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->back()->with('success', "admin deleted succesfully");
    }

}
