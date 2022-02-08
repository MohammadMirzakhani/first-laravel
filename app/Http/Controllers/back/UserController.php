<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','DESC')->paginate(10);
        return view('back.users.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $pagetitle='صفحه پروفایل کاربری';
        return view('back.users.useredit',compact('pagetitle','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
             $messages = [
            'name.required' => 'فیلد عنوان را وارد نمایید',
            'email.required' => 'فیلد ایمیل را وارد نمایید',
            'email.unique'=>'از این ایمیل قبلا استفاده شده است . ایمیل جدید وارد کنید',
            'phone.required' => 'فیلد تلفن را وارد نمایید',
            'password.min' => 'تعداد کاراکتر ایمیل حداقل هشت کاراکتر میباشد',
            'password_confirmation.min' => 'تعداد کاراکتر ایمیل حداقل هشت کاراکتر میباشد',


        ];
        if(!empty($request->password)){

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$user->id,
                'phone' => 'required',
                'password' => 'min:8',
                'password_confirmation' => 'min:8',
            ], $messages);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $password=Hash::make($request->password);
            $user->password = $password;
        }
        else{
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$user->id,
                'phone' => 'required',
            ], $messages);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
        }



        $user->save();

        $msg = "ویرایش با موفقیت انجام شد";
        return redirect(route('admin.users'))->with('success', $msg);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $msg = "حذف با موفقیت انجام شد";
        return redirect(route('admin.users'))->with('success', $msg);
    }
    public function updatestatus(User $user){
        switch($user->status){
           case 1:
            $user->status=2;
           break;
           case 2:
            $user->status=3;
           break;
           case 3:
            $user->status=1;
           break;
        }
        $user->save();
        $msg = "وضعیت با موفقیت تغییر کرد";
        return redirect(route('admin.users'))->with('success', $msg);
    }
}
