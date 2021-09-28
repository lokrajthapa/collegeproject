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
         $notices= Notice::all();
          return view('admin.notice.all-notices',compact('notices'));
      }
      
      public function editNotice($id)
      {
         $notice = Notice::find($id);
         return view('admin.notice.edit-notice', compact('notice'));
      }

      public function updateNotice(Request $request)
      {
         $title = $request->title;
         $link =$request->link;
         $text =$request->text;
         $image =$request->file('image');
         $imageName=time().'.'.$image->extension();
         $image->move(public_path('/uploads/notice'), $imageName);

         $notice = Notice::find($request->id);
         $notice->title = $title;
         $notice->link =$link;
         $notice->text = $text;
         $notice->image =$imageName;
         $notice->save();
         return back()->with('notice_updated','notice is successfully updated');

      }
      public function deleteNotice($id)
      {
         $notice = Notice::find($id);
         unlink(public_path('/uploads/notice').'/'.$notice->image);
         $notice->delete();
         return back()->with('notice_deleted','notice is delete successfully');
      }
      
}
