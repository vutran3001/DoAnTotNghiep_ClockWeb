<?php

namespace App\Http\Controllers;

use App\Models\Mau;
use App\Http\Requests\StoreMauRequest;
use App\Http\Requests\UpdateMauRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mau = DB::select('select * from maus');
        return view('Admin.Mau.mau_index',['mau'=>$mau]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Mau.mau_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMauRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        if($name!=null)
        {
            $mau=new Mau();
            $tt=1;
            $mau->fill([
                'TenMau'=>$request->input('name'),
                'TrangThai'=>$tt,
            ]);
            $mau->save();
            session()->flash('success', 'Thêm màu thành công.');
            return Redirect::route('Mau.index');
        }
        else
        {
            session()->flash('fail', 'Bạn phải nhập đầy đủ thông tin.');
            return Redirect::route('Mau.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function show(Mau $mau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $edit=Mau::where('id','=',$id)->get();
        return view('Admin.Mau.mau_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMauRequest  $request
     * @param  \App\Models\Mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mau $Mau)
    {
        $Mau->fill([
            'TenMau'=>$request->input('name'),
            'TrangThai'=>$request->input('trangthai')
        ]);
        $Mau->save();
        session()->flash('success', 'Cập nhật màu thành công.');
        return Redirect::route('Mau.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mau  $mau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mau $Mau)
    {
        $tt=2;
        $Mau->fill([
            'TrangThai'=>$tt,
        ]);
        $Mau->save();
        session()->flash('success', 'Đã dừng hoạt động màu thành công');
        return Redirect::route('Mau.index');
    }
}
