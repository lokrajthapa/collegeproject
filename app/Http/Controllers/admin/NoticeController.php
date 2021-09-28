<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;


class NoticeController extends Controller
{
    public function addNotice()
    {
       return view('admin/notice/add-notice');
    }
    public function NoticeStore(Request $request)
      {
         $title = $request->title;
         $link =$request->link;
         $text =$request->text;
         $image =$request->file('image');
         $imageName=time().'.'.$image->extension();
         $image->move(public_path('/uploads/notice'), $imageName);

         $notice = new Notice();
         $notice->title=$title;
         $notice->link=$link;
         $notice->text =$text;
         $notice->image =$imageName;
         $notice->save();
         return redirect()->back()->with('notice_added',' Notice  Stored successfully');

      }
      public function notices()
      {
          return view('admin.notice.all-notices');
      }
}
