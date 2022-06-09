<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('Admin.Account.account_index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Account.account_edit');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $ID)
    {
        $edit=User::where('id','=',$ID)->get();
        return view('Admin.Account.account_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $User->fill([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'GioiTinh'=>$request->input('gt'),
            'NgaySinh'=>$request->input('date'),
            'DiaChi'=>$request->input('address'),
            'SDT'=>$request->input('sdt'),
            'Quyen'=>$request->input('quyen'),
            'TrangThai'=>$request->input('trangthai')
        ]);
        $User->save();
        session()->flash('success', 'Cập nhật tài khoản thành công.');
        return Redirect::route('User.index',['User'=>$User->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request,User $User)
    {
        $tt=2;
        $User->fill([
            'TrangThai'=>$tt,
        ]);
        $User->save();
        session()->flash('success', 'Đã dừng hoạt động tài khoản thành công');
        return Redirect::route('User.index');
    }
}
