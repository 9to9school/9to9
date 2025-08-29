<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Role;
use \App\Models\PermissionModel;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    // Show index page
    public function index()
    {       
      $role = Role::get();
      return view('admin.role.role.index',compact('role'));
    }

    // Show create role page
    public function create()
    {     
      return view('admin.role.role.create');
    }
    
    // Handle  the create request 
    public function save(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:255',  
            'group_name' => 'required',     
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->group_name = $request->group_name;
        $role->status = 1;
        $role->save();

        $permission = $request->permissions;


        if ($permission) {
            $permValue = json_encode($permission, true); 
            $permissionModel = new PermissionModel();
            $permissionModel->name = $permValue; 
             $permissionModel->role_id = $role->id; 
            $permissionModel->status = 1;
            $permissionModel->guard_name = $request->group_name;
            $permissionModel->save();
        }

        if($role){
          return redirect()->route('role.list')->with('success', 'Role added successfully.');
        }else{
          return redirect()->route('role.list')->with('error', 'There was an issue adding the role.');
        }

    }


    // Show edit role page
    public function edit($id)
    {       
      $roledata = Role::find($id);
       // get existing permissions for the role
       $permissions = PermissionModel::where('role_id',$id)->first();
       $per = json_decode($permissions->name);
      return view('admin.role.role.edit',compact('roledata','per'));
    }

    // Handle the edit request
    function update(Request $request){
      
        $role = Role::find($request->id);

        $request->validate([
             'name' => 'required|string|max:255',  
            'group_name' => 'required',        
        ]);
        $role->name = $request->name;
        $role->group_name = $request->group_name;
        $role->status = 1;
        $role->save();

        $permission = $request->permissions;

        if ($permission) {
            $permissionModel = PermissionModel::where('role_id',$request->id)->first();
            $permValue = json_encode($permission, true); 
            $permissionModel->name = $permValue; 
            $permissionModel->role_id = $role->id; 
            $permissionModel->status = 1;
            $permissionModel->guard_name = $request->group_name;
            $permissionModel->save();
        }
   

        if($role){
          return redirect()->route('role.list')->with('success', 'Role Update successfully.');
        }else{
          return redirect()->route('role.list')->with('error', 'There was an issue updating the role.');
        }

    }

    // Handle the delete request
    public function destroy($id)
    {
        $delete = Role::where('id', $id)->delete();
        $delete = PermissionModel::where('role_id',$id)->delete();

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

    // Status Change
    public function status(Request $request){
        $category = Role::find($request->id);
        if($request->status == '1'){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        $category->save();
        return response()->json(['success'=>'status change successfully.']);
    }
 

     // Role based fetch route 
    public function getRoutes(Request $request)
    {
        $rolePrefix = $request->role;  

        // if($rolePrefix == 'marketing'){
        //     $data['routes'] = collect(\Route::getRoutes())
        //                   ->filter(fn($route) => str_starts_with($route->uri(), 'admin'))
        //                   ->map(fn($route) => $route->uri());

        // }else{
         $data['routes'] = collect(\Route::getRoutes())
                          ->filter(fn($route) => str_starts_with($route->uri(), $rolePrefix))
                          ->map(fn($route) => $route->uri());

        // }
        return response()->json($data);
    }
   
    // For school dashbaord

    // Show index page
    public function schoolroleIndex()
    {       
      $role = Role::get();
      return view('school.role.role.index',compact('role'));
    }

    // Show create role page
    public function scoolrolecreate()
    {     
      return view('school.role.role.create');
    }
    
    // Handle  the create request 
    public function scoolroleSave(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:255',  
            'group_name' => 'required',     
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->group_name = $request->group_name;
        $role->status = 1;
        $role->save();

        $permission = $request->permissions;


        if ($permission) {
            $permValue = json_encode($permission, true); 
            $permissionModel = new PermissionModel();
            $permissionModel->name = $permValue; 
            $permissionModel->status = 1;
            $permissionModel->guard_name = $request->group_name;
             $permissionModel->role_id = $role->id;
            $permissionModel->save();
        }$permission = $request->permissions;


        if ($permission) {
            $permValue = json_encode($permission, true); 
            $permissionModel = new PermissionModel();
            $permissionModel->name = $permValue; 
            $permissionModel->status = 1;
            $permissionModel->guard_name = $request->group_name;
             $permissionModel->role_id = $role->id;
            $permissionModel->save();
        }

        if($role){
          return redirect()->route('school.role.list')->with('success', 'Role added successfully.');
        }else{
          return redirect()->route('school.role.list')->with('error', 'There was an issue adding the role.');
        }

    }


    // Show edit role page
    public function SchoolroleEdit($id)
    {       
      $roledata = Role::find($id);
      $permission = PermissionModel::where('role_id',$id)->first();
      $assignedPermissions = json_decode($permission->name);
      return view('school.role.role.edit',compact('roledata','assignedPermissions'));
    }

    // Handle the edit request
    function schoolroleUpdate(Request $request){
      
        $role = Role::find($request->id);

        $request->validate([
            'name' => 'required|string|max:255',      
        ]);
        $role->name = $request->name;
        $role->group_name = $request->group_name;
        $role->save();


        $permission = $request->permissions;


          if ($permission) {
          // Encode the $permission array into JSON string
          $permValue = json_encode($permission);

          // Find existing permission record by role_id (or other criteria)
          $permissionModel = PermissionModel::where('role_id', $role->id)->first();

          if ($permissionModel) {
              // Update existing record
              $permissionModel->name = $permValue;
              $permissionModel->status = 1;
              $permissionModel->guard_name = $request->group_name;
              $permissionModel->save();
          } else {
              // Create new record if not found
              $permissionModel = new PermissionModel();
              $permissionModel->name = $permValue;
              $permissionModel->status = 1;
              $permissionModel->guard_name = $request->group_name;
              $permissionModel->role_id = $role->id;
              $permissionModel->save();
          }
      }

        if($role){
          return redirect()->route('school.role.list')->with('success', 'Role Update successfully.');
        }else{
          return redirect()->route('school.role.list')->with('error', 'There was an issue updating the role.');
        }

    }

    // Handle the delete request
    public function schoolroledestroy($id)
    {
        $delete = Role::where('id', $id)->delete();
        $deletepermiss = PermissionModel::where('role_id', $id)->delete();

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

     // Status Change
    public function schoolroleStatus(Request $request){
        $category = Role::find($request->id);
        if($request->status == '1'){
            $category->status = '1';
        }else{
            $category->status = '0';
        }
        $category->save();
        return response()->json(['success'=>'status change successfully.']);
    }
 

     // Role based fetch route 
    public function schoolroleGetRoutes(Request $request)
    {
        $rolePrefix = $request->role;  

        $data['routes'] = collect(\Route::getRoutes())
                          ->filter(fn($route) => str_starts_with($route->uri(), 'school'))
                          ->map(fn($route) => $route->uri());

        return response()->json($data);
    }


    


}
