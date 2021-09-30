<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
     
    public function addNote()
    {
       return view('admin/note/add-note');
    }

    public function NoteStore(Request $request)
    { 
       $grade = $request->grade;
       $Sub_name =$request->Sub_name;
       $description =$request->description;
       $file =$request->file('File_name');
       $fileName=time().'.'.$file->extension();
       $file->move(public_path('/uploads/note'), $fileName);

       $note = new Note();
       $note->grade=$grade;
       $note->Sub_name=$Sub_name;
       $note->description =$description;
       $note->File_name =$fileName;
       $note->save();
       return redirect()->back()->with('note_added',' Note  Stored successfully');

    }
    public function notes()
      {
         $notes= Note::all();
          return view('admin.note.all-notes',compact('notes'));
      }
    
      public function editNote($id)
      {
         $note = Note::find($id);
         return view('admin.note.edit-note', compact('note'));
      }
      public function  updateNote(Request $request)
      { 
         $grade = $request->grade;
         $Sub_name =$request->Sub_name;
         $description =$request->description;
         $file =$request->file('File_name');
         $fileName=time().'.'.$file->extension();
         $file->move(public_path('/uploads/note'), $fileName);
  
         $note = Note::find($request->id);
         $note->grade=$grade;
         $note->Sub_name=$Sub_name;
         $note->description =$description;
         $note->File_name =$fileName;
         $note->save();
         return redirect()->back()->with('note_updated',' Note  Updated  successfully');
  
      }
      public function deleteNote($id)
      {
         $note = Note::find($id);
         unlink(public_path('/uploads/note').'/'.$note->File_name);
         $note->delete();
         return back()->with('note_deleted','note is delete successfully');
      }
      
}
