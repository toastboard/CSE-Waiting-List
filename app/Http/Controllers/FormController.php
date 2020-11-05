<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Waiting_List_Entry;
use Auth;

class FormController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $msuid = Auth::user()->msuid;
        $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $major = Auth::user()->major;
        $courses = Course::all()->pluck('full_name', 'full_name');

        return view('pages.form', ['id' => $msuid, 'email' => $email, 'first_name' => $first_name, 'last_name' => $last_name, 'major' => $major, 'courses' => $courses]);
    }

    public function store(Request $request)
    {
        // return view('pages.test')->with('test', $request->input('test'));

        $this->validate($request, [
            'studID' => 'required|numeric',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'studemail' => 'required|email',
            'course_num' => 'required',
            'currhours' => 'required|numeric',
            'requiredforgrad' => 'required'
        ]);

        $waiting_list_entry = new Waiting_List_Entry;
        $waiting_list_entry->list = rand(1,10000);
        $waiting_list_entry->id = $request->input('studID');
        $waiting_list_entry->email = $request->input('studemail');        
        $waiting_list_entry->first_name = $request->input('first_name');
        $waiting_list_entry->last_name = $request->input('last_name');
        $waiting_list_entry->major = $request->input('studmajor');

        $course_arr = explode(' ', $request->input('course_num'));
        $waiting_list_entry->course_selection = $course_arr[0];
        $waiting_list_entry->field = $course_arr[2]; // For some reason the index for the course number is 2 even though it should be 1. I don't know why this happens.

        $waiting_list_entry->type = $request->input('overtype');
        $waiting_list_entry->campus = $request->input('campus');
        $waiting_list_entry->date = date('Y-m-d');
        $waiting_list_entry->graduation_time = time();
        $waiting_list_entry->time = time();
        $waiting_list_entry->current_hours = $request->input('currhours');
        $waiting_list_entry->is_required = $request->input('requiredforgrad');
        $waiting_list_entry->comments = $request->input('comments');
        $waiting_list_entry->save();

        
        return view("pages.confirmation", 
        ["course_num"=>$request->input('course_num'),
        "campus"=>$request->input('campus'),
        "overtype"=>$request->input('overtype'),
        "comments"=>$request->input('comments'),
        
        
        ]);
        
    
    }
    
}
