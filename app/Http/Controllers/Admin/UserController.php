<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\HelperController;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateAds;
use App\Http\Requests\UpdateUser;
use App\Models\Action;
use App\Models\Ads;
use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File;

class UserController extends HelperController
{

    function __construct()
    {
        $this->namePage = 'users';
        $this->middleware('permission:show users', ['only' => 'index']);
        $this->middleware('permission:create users', ['only' => 'create', 'store']);
        $this->middleware('permission:edit users', ['only' => 'edit', 'update']);
        $this->middleware('permission:delete users', ['only' => 'destroy']);
    }

    public function form_builder()
    {
        $locale = app()->getLocale();
        $countries = [];
        $values = Country::get(['name', 'id']);
        foreach ($values as $item)
            $countries[$item->id] = $item->getOriginal('name')[$locale];
        $this->inputs = [
            'name'       => ['title' => 'Name',],
            'email'      => ['title' => 'email', 'type' => 'email'],
            'password'   => ['title' => 'password', 'type' => 'password'],
            'phone'      => ['title' => 'phone', 'type' => 'number'],
            'country_id' => ['title' => 'country', 'type' => 'select', 'values' => $countries],
        ];
    }

    public function index()
    {
        $users = User::withCount('orders', 'bookings')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->form_builder();
        $this->title = trans('admin.' . $this->namePage);
        $this->method = 'post';
        $this->action = route("users.store");
        return view('form', get_object_vars($this));
    }

    public function store(StoreUser $request)
    {
        $user = User::create($request->except('password'));
        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        $message = trans('admin.add_suc');
        return redirect()->route('users.index')->with(['message' => $message]);
    }

    public function edit($id)
    {
        $this->form_builder();
        $this->model = User::findOrFail($id);
        $this->title = trans('admin.' . $this->namePage);
        $this->method = 'put';
        $this->action = route("users.update", $id);
        return view('form', get_object_vars($this));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUser $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('password'));
        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        $action = new Action();
        $action->saveAction([
                                'ar' => 'قام بتعديل عميل حالي ' . $user->name,
                                'en' => 'Edit current user ' . $user->name
                            ]);
        $message = trans('admin.edit_suc');
        return redirect('admin/users')->with(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $action = new Action();
        $action->saveAction([
                                'ar' => 'قام بحذف  عميل حالي ' . $user->name,
                                'en' => 'Delete current user ' . $user->name,
                            ]);
        if ($user->orders()->count() > 0 || $user->bookings()->count()) {
            $message = __('can not delete , User has orders or bookings');
            return back()->with(['error' => $message]);
        } elseif ($user->type == 'admin') {
            $message = __('can not delete');
            return back()->with(['error' => $message]);
        }
        $user->delete();
        $message = trans('admin.delete_suc');
        return back()->with(['message' => $message]);
    }

}
