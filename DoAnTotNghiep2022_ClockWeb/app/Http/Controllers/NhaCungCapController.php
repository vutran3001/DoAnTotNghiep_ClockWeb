<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use App\Http\Requests\StoreNhaCungCapRequest;
use App\Http\Requests\UpdateNhaCungCapRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ncc = DB::select('select * from nha_cung_caps');
        return view('Admin.NhaCungCap.nhacungcap_index',['ncc'=>$ncc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.NhaCungCap.nhacungcap_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhaCungCapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        $diachi=$request->input('diachi');
        $sdt=$request->input('sdt');
        if($name!=null && $diachi!=null && $sdt!=null)
        {
            $ncc=new NhaCungCap;
            $tt=1;
            $ncc->fill([
                'TenNhaCungCap'=>$request->input('name'),
                'DiaChi'=>$request->input('diachi'),
                'SDT'=>$request->input('sdt'),
                'TrangThai'=>$tt,
            ]);
            $ncc->save();
            session()->flash('success', 'Thêm nhà cung cấp thành công.');
            return Redirect::route('NhaCungCap.index');
        }
        else
        {
            session()->flash('fail', 'Bạn phải nhập đầy đủ thông tin.');
            return Redirect::route('NhaCungCap.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function show(NhaCungCap $nhaCungCap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $edit=NhaCungCap::where('id','=',$id)->get();
        return view('Admin.NhaCungCap.nhacungcap_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhaCungCapRequest  $request
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NhaCungCap $NhaCungCap)
    {
        $NhaCungCap->fill([
            'TenNhaCungCap'=>$request->input('name'),
            'DiaChi'=>$request->input('diachi'),
            'SDT'=>$request->input('sdt'),
            'TrangThai'=>$request->input('trangthai')
        ]);
        $NhaCungCap->save();
        session()->flash('success', 'Cập nhật nhà cung cấp thành công.');
        return Redirect::route('NhaCungCap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(NhaCungCap $NhaCungCap)
    {
        $tt=2;
        $NhaCungCap->fill([
            'TrangThai'=>$tt,
        ]);
        $NhaCungCap->save();
        session()->flash('success', 'Đã dừng hoạt động nhà cung cấp thành công');
        return Redirect::route('NhaCungCap.index');
    }
}
