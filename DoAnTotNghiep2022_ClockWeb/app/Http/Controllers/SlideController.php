<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class SlideController extends Controller
{
    protected function FixImage(Slide $Slide)   
    {
        //chạy lệnh php artisan storage:link
        if (Storage::disk('public')->exists($Slide->Anh)) {
            $Slide->Anh= Storage::url($Slide->Anh);

        }
        else{
            $Slide->Anh='/images/Slide/loi.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = DB::select('select * from slides');
        return view('Admin.Slide.slide_index',['slide'=>$slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Slide.slide_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSlideRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        $mota=$request->input('mota');
        $link=$request->input('link');
        if($name!=null && $mota!=null && $link!=null)
        {
            $slide=new Slide;
            $tt=1;
            $slide->fill([
                'TenSlide'=>$request->input('name'),
                'Anh'=>'',
                'MoTa'=>$request->input('mota'),
                'Link'=>$request->input('link'),
                'TrangThai'=>$tt
            ]);
            $slide->save();
    
            if($request->hasFile('anh'))
            {
                $slide->Anh=$request->file('anh')->storeAs('images/Slide','slide'.$slide->id.'.jpg','public');
            }
            $this->FixImage($slide);
           
            $slide->save();
            session()->flash('success', 'Thêm Slide thành công.');
            return Redirect::route('Slide.index');
        }
        else
        {
            session()->flash('fail', 'Bạn phải nhập đầy đủ thông tin.');
            return Redirect::route('Slide.create');
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $show=Slide::where('id','=',$id)->get();
        return view('Admin.Slide.slide_show',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(int $ID)
    {
        $slide=Slide::where('id','=',$ID)->get();
        return view('Admin.Slide.slide_edit',['slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSlideRequest  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $Slide)
    {
        if($request->hasFile('anh'))
        {
            $Slide->Anh=$request->file('anh')->storeAs('images/Slide','slide'.$Slide->id.'.jpg','public');
        }
        if(Storage::disk('public')->exists($Slide->Anh))
        {
            $Slide->Anh=Storage::url($Slide->Anh);
        }
        else
        {
            $Slide->Anh=$Slide->Anh;
        }
        $Slide->fill([
            'TenSlide'=>$request->input('name'),
            'Mota'=>$request->input('mota'),
            'Link'=>$request->input('link'),
            'TrangThai'=>1,
        ]);
        $Slide->save();
        session()->flash('success', 'Cập nhật thành công.');
        return Redirect::route('Slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from slides where id= ?',[$id]);
        session()->flash('success', 'Xóa thành công.');
        return Redirect::route('Slide.index');
    }
}
