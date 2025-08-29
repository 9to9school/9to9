<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\PermissionModel;

class PermissionController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
        $data['page_heading'] = 'All Permissions';
        $data['permisssion'] = PermissionModel::get();
        $data['all_routes'] = collect(\Route::getRoutes())->map(function ($route) { return $route->uri(); });
        return view('admin.role.permissions.index',$data);
    }

    public function create()
    {
        $data['page_heading'] = 'All Permissions';
        $data['permisssion'] = PermissionModel::get();
        $data['all_routes'] = collect(\Route::getRoutes())->map(function ($route) { return $route->uri(); });
        return view('admin.role.permissions.create',$data);
    }

    public function save(Request $request)
    {
        $permission = new PermissionModel;
        $permission->name = $request->name;

        // Replace all spaces with hyphens in the guard_name
        $permission->guard_name = '/'.str_replace(' ', '-', strtolower($request->name));

        $permission->save();
        return redirect()->back();
    }


    public function edit($id)
    {
        $data['page_heading'] = 'Edit Permission';
        $data['edit_permission'] = PermissionModel::find($id);
        return view('admin.role.permissions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = PermissionModel::find($request->id);
        $update->name = $request->name;
        $update->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PermissionModel::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Role deleted successfully";
        } else {
            $success = true;
            $message = "Role not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
