<?php

namespace App\Services\Users;

use App\Models\User;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserService extends CommonService
{
    public function __construct()
    {
        $this->rules = [
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required|confirmed',
        ];
        $this->updateRules = [
            'name' => 'required',
            'surname' => 'required',
            'password' => 'nullable|confirmed',
        ];
        $this->fields = ['email', 'name', 'surname', 'password'];
    }

    public function save(Request $request, $id = null)
    {
        try {
            Log::info('request: ' . json_encode($request->toArray()));
            $this->ajaxValidate($request, $id ? $this->updateRules : $this->rules);
            if ($id == null) {
                $user = User::create($request->only($this->fields));
            } else {
                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->surname = $request->surname;
                $user->email = $request->email;
                if (isset($request->password))
                    $user->password = $request->password;
                $user->update();
            }
            $user->syncRoles($request->user_role);
            return $this->succesResponse();
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    public function createUser(Request $request)
    {
        return $this->save($request);
    }

    public function redirectToCreatePage()
    {
        $item = new User();
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles', 'item'));
    }

    public function updateUser(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function redirectToEditPage($id)
    {
        $item = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.user.edit', compact('roles', 'item'));
    }

    public function deleteUser($id)
    {
        User::findById($id)->delete();
        return redirect(route('admin.users.index'));
    }
}
