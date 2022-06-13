<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Http\Requests\StoreLoaiSanPhamRequest;
use App\Http\Requests\UpdateLoaiSanPhamRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaisp = DB::select('select * from loai_san_phams');
        return view('Admin.LoaiSanPham.loaisp_index',['loaisp'=>$loaisp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.LoaiSanPham.loaisp_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoaiSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        if($name!=null)
        {
            $loaisp=new LoaiSanPham;
            $tt=1;
            $loaisp->fill([
                'TenLoaiSanPham'=>$request->input('name'),
                'TrangThai'=>$tt,
            ]);
            $loaisp->save();
            session()->flash('success', 'Thêm loại sản phẩm thành công.');
            return Redirect::route('LoaiSanPham.index');
        }
        else
        {
            session()->flash('fail', 'Bạn phải nhập đầy đủ thông tin.');
            return Redirect::route('LoaiSanPham.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiSanPham $loaiSanPham)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $edit=LoaiSanPham::where('id','=',$id)->get();
        return view('Admin.LoaiSanPham.loaisp_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoaiSanPhamRequest  $request
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoaiSanPham $LoaiSanPham)
    {
        $LoaiSanPham->fill([
            'TenLoaiSanPham'=>$request->input('name'),
            'TrangThai'=>$request->input('trangthai')
        ]);
        $LoaiSanPham->save();
        session()->flash('success', 'Cập nhật loại sản phẩm thành công.');
        return Redirect::route('LoaiSanPham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiSanPham $LoaiSanPham)
    {
        $tt=2;
        $LoaiSanPham->fill([
            'TrangThai'=>$tt,
        ]);
        $LoaiSanPham->save();
        session()->flash('success', 'Đã dừng hoạt động loại sản phẩm thành công');
        return Redirect::route('LoaiSanPham.index');
    }
}
