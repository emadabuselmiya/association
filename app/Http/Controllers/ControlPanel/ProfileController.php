<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('c-panel.profile');
    }

    public function updatePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'], // password_confirmation
        ]);

        if ($validation->fails()) {
            toastr()->error('يرجى التاكد من ادخال البيانات');
        } else {
            if (Hash::check($request->input('current_password'), Auth::user()->password)) {
                $user = User::findOrFail(Auth::id());
                $user->update([
                    'password' => Hash::make($request->input('password')),
                ]);

                toastr()->success('تم العملية بنجاح');
            } else {
                toastr()->error('كلمة المرور الحالية غير صحيحة');
            }
        }

        return back();
    }

    public function updatePersonal(Request $request)
    {
        $user_id = Auth::id();

        $validation = Validator::make($request->all(), [
            'password' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'user_name' => "required|unique:users,user_name,$user_id",
            'email' => "required|unique:users,email,$user_id",
        ]);

        if ($validation->fails()) {
            toastr()->error('يرجى التاكد من ادخال البيانات');
        } else {
            $data = $request->except('password');
            if (Hash::check($request->input('password'), Auth::user()->password)) {
                $user = User::findOrFail($user_id);

                $user->update($data);


                toastr()->success('تم العملية بنجاح');
            } else {
                toastr()->error('كلمة المرور الحالية غير صحيحة');
            }
        }

        return back();
    }
}
