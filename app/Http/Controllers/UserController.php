<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(User $userr)
    {
        if(Gate::allows('edit_profile',$userr))
        {
            $pagetitle='صفحه پروفایل کاربری';
            return view('front.auth.porofile',compact('pagetitle','userr'));
        }
        else
        {
            return "You dont have access";
        }

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
        return redirect(route('home'))->with('success', $msg);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
