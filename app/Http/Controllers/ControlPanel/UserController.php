<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * function for view all user
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return datatables()->of($users)
                ->editColumn('role', function (User $user) {
                    return $user->role ?? "لا يوجد";
                })
                ->editColumn('phone', function (User $user) {
                    return $user->phone ?? "لا يوجد";
                })
                ->addColumn('actions', function (User $user) {
                    $delete = '';
                    if (Auth::id() != $user->id) {
                        $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $user->id . '">' .
                            'حذف</a>';
                    }
                    $edit = ' <a href="' . route('edit-users', $user->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions'])
                ->addIndexColumn()
                ->make(true);
        }
        $users = User::all();

        return view('c-panel.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * function for view create page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('c-panel.users.create');
    }

    /**
     * function for view create page
     *
     * @param App\Http\Requests\StoreUserRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        event(new Registered($user));


        return redirect()->route('all-users')->with('success', __('User ') . $user->name . __(' Created!'));
    }


    /**
     * function for view ebit user page
     *
     * @param App\Models\User $user
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('c-panel.users.edit', [
            'user' => $user,
        ]);
    }


    /**
     * function for update user in database
     *
     * @param App\Models\User $user
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'min:8', 'string'],
            'phone' => ['numeric', 'min:10', 'nullable', "unique:users,phone," . $user->id],
            'address' => ['string', 'nullable'],
        ]);

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('all-users')->with('success', __('User ') . $user->name . __(' Updated!'));
    }


    /**
     * function for delete user from database
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('all-users')->with('success', __('User deleted!'));
    }


}
