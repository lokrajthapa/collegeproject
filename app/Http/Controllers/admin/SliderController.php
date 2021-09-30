<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
     public function index()
     {
         $slider=Slider::all();
         return view('admin.slider.index',compact('slider'));
     }
     public function create()
     {
         return view('admin.slider.create');
     }
     public function store(Request $request)
     { 
       
         $slider= new Slider;
         $slider->title = $request->input('title');
         if($request->hasfile('slider_image'))
         {
             $file = $request->file('slider_image');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('uploads/sliders/',$filename); 
             $slider->slider_image = $filename;

         }
         $slider->save();
         return redirect()->back()->with('success','Slider image updated successfully');



     }
     public function edit($id)
     {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
     }
     public function update(Request $request, $id)
     {   
         $slider = Slider::find($id); 
         $slider->title = $request->input('title');
         if($request->hasfile('slider_image'))
         {
             $destination ='uploads/sliders/'.$slider->slider_image;
             if(File::exists($destination))
             { 
                 File::delete($destination);

             }
             $file = $request->file('slider_image');
             $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
             $file->move('uploads/sliders/',$filename); 
             $slider->slider_image = $filename;

         }
         $slider->update();
         return redirect()->back()->with('status','Slider image updated successfully');
     }
     public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return back()->with('success','Product deleted successfully');
    }
}
