<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Services\Sliders\SliderService;
use App\Models\Slider;
use http\Env\Response;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider=$slider;
    }
    public function create()
    {

        return view('admin.slider.add',['title'=>'Thêm slider']);
   }

    public function store(SliderRequest $request)
    {
        $this->slider->createadd($request);
        return redirect()->back();
   }

    public function index()
    {
        return view('admin.slider.list',[
            'title' =>'Danh sách slide mới nhất',
            'sliders' => $this->slider->get()
        ]);
   }
    public function show(Slider $slider)
    {
        return view('admin.slider.edit',[
            'title' =>'Chỉnh sửa slide',
            'slider' =>$slider
        ]);
    }

    public function update(SliderRequest $request,Slider $slider)
    {
        $result = $this->slider->update($request,$slider);
        if ($result ){
            return redirect('/admin/slider/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result=$this->slider->destroy($request);
        if ($result){
            return response()->json([
                'error' =>false,
                'message'=>'Xóa thành công '
            ]);
        }

        return response()->json(['error'=>true]);

    }



}
