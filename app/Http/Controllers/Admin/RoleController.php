<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Models\Action;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    function __construct(Role $role)
    {
        $this->role = $role;
        $this->middleware('permission:show_roles',['only' => 'index']);
        $this->middleware('permission:create_roles',['only' => 'create','store']);
        $this->middleware('permission:edit_roles',['only' => 'edit','update']);
        $this->middleware('permission:delete_roles',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        $action = new Action();
        $action->saveAction('Open supervisors page');

        $roles = Role::where('guard_name','web')->latest()->get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $permission = Permission::where('guard_name','web')->get();
        return view('admin.roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRole $request
     * @return Response
     */
    public function store(StoreRole $request)
    {

        $role = Role::firstOrCreate(['name' => $request->name]);
        $role->syncPermissions($request->input('permission'));
//        $action = new \App\Models\Action();
//        $action->user_id = Auth::User()->id;
//        $action->ar_action = 'قام بإضافة مشرف جديد ' . $request['first_name'] . ' ' . $request['last_name'];
//        $action->en_action = 'Add new supervisor ' . $request['first_name'] . ' ' . $request['last_name'];
//        $action->ip = request()->ip();
//        $action->save();

        $message = trans('admin.add_suc');
        return back()->with(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::where('guard_name','web')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
                             ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                             ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRole $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateRole $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->syncPermissions($request->input('permission'));
//        $action = new \App\Models\Action();
//        $action->user_id = Auth::User()->id;
//        $action->ar_action = 'قام بتعديل مشرف حالي ' . $request['ar_name'];
//        $action->en_action = 'Edit current supervisor ' . $request['ar_name'];
//        $action->ip = request()->ip();
//        $action->save();

        $message = trans('admin.edit_suc');
        return redirect('admin/roles')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $role = Role::find($id);
        $role->delete();
        $action = new Action();
        $action->saveAction('Delete current supervisor ' . $role->name);

        $message = trans('admin.delete_suc');
        return back()->with(['message' => $message]);

    }

}
