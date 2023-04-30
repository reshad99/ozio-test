<?php

namespace App\Services\Users;

use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RoleService extends CommonService
{
    public function __construct()
    {
        $this->rules = [
            'title' => 'required|max:255',
        ];
    }

    public function save(Request $request, $id = null)
    {
        try {
            Log::info('request: ' . json_encode($request->toArray()));
            $this->ajaxValidate($request, $this->rules);
            $role = $id ? Role::findById($id) : new Role();
            $role->title = $request->title;
            $role->name = Str::slug($request->title);
            $role->save();
            $role->syncPermissions($request->permissions);
            return $this->succesResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    public function createRole(Request $request)
    {
        return $this->save($request);
    }

    public function redirectToCreatePage()
    {
        $item = new Role();
        $permissions = Permission::all();
        return view('admin.pages.role.create', compact('permissions', 'item'));
    }

    public function updateRole(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function redirectToEditPage($id)
    {
        $item = Role::findById($id);
        $permissions = Permission::all();
        return view('admin.pages.role.edit', compact('permissions', 'item'));
    }

    public function deleteRole($id)
    {
        Role::findById($id)->delete();
        return redirect(route('admin.roles.index'));
    }
}
