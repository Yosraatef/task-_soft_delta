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
use App\Http\Requests\UpdateProfile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    function __construct(User $User)
    {
        $this->user = $User;
        $this->middleware('permission:show_profile',['only' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfile $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateProfile $request, $id)
    {

        $user = User::findOrFail($id);
        $user->update($request->except('password'));
        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        $action = new Action();
        $action->action = 'Updated profile information';
        $action->user_id = Auth::user()->id;
        $action->ip = null;
        $action->save();

        $message = __('Profile update successfully');
        return back()->with(['message' => $message]);
    }

}
