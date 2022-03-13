<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{

    function __construct(User $User)
    {
        $this->user = $User;
        $this->middleware('permission:show_admins', ['only' => 'index']);
        $this->middleware('permission:create_admins', ['only' => 'create', 'store']);
        $this->middleware('permission:edit_admins', ['only' => 'edit', 'update']);
        $this->middleware('permission:delete_admins', ['only' => 'destroy']);
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

        $admins = User::latest()->get();
        return view('admin.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = Role::where('guard_name','web')->pluck('name','id')->all();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdmin $request
     * @return RedirectResponse
     */
    public function store(StoreAdmin $request)
    {

        $admin = User::create($request->except('password'));
        if ($request->password) {
            $admin->update(['password' => bcrypt($request->password)]);
        }

        $admin->assignRole($request->input('roles'));
        $action = new Action();
        $action->saveAction('Add new supervisor');

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
        $admin = User::FindOrFail($id);
        $roles = Role::where('guard_name','web')->pluck('name','id')->all();
        $userRole = $admin->roles()->pluck('id', 'name')->toArray();
        return view('admin.admins.edit', compact('admin', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdmin $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateAdmin $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('password'));
        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        $action = new Action();
        $action->saveAction('Edit current supervisor');

        $message = trans('admin.edit_suc');
        return redirect('admin/admins')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {

        $admin = User::find($id);
        $admin->delete();
        $action = new Action();
        $action->saveAction('Delete current supervisor ' . $admin->name);
        $message = trans('admin.delete_suc');
        return back()->with(['message' => $message]);

    }

}
