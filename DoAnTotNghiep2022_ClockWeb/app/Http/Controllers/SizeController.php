<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = DB::select('select * from sizes');
        return view('Admin.Size.size_index',['size'=>$size]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Size.size_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        if($name!=null)
        {
            $size=new Size();
            $tt=1;
            $size->fill([
                'TenSize'=>$request->input('name'),
                'TrangThai'=>$tt,
            ]);
            $size->save();
            session()->flash('success', 'Thêm size thành công.');
            return Redirect::route('Size.index');
        }
        else
        {
            session()->flash('fail', 'Bạn phải nhập đầy đủ thông tin.');
            return Redirect::route('Size.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $edit=Size::where('id','=',$id)->get();
        return view('Admin.Size.size_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $Size)
    {
        $Size->fill([
            'TenSize'=>$request->input('name'),
            'TrangThai'=>$request->input('trangthai')
        ]);
        $Size->save();
        session()->flash('success', 'Cập nhật size thành công.');
        return Redirect::route('Size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $Size)
    {
        $tt=2;
        $Size->fill([
            'TrangThai'=>$tt,
        ]);
        $Size->save();
        session()->flash('success', 'Đã dừng hoạt động size thành công');
        return Redirect::route('Size.index');
    }
}
