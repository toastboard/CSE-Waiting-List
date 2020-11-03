<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Waiting_List;

class FormController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = '903113053';
        $email = 'test@test.com';
        $first_name = 'Testfirst';
        $last_name = 'Testlast';
        $major = 'CS';
        $courses = Course::all()->pluck('full_name', 'full_name');

        return view('pages.form', ['id' => $id, 'email' => $email, 'first_name' => $first_name, 'last_name' => $last_name, 'major' => $major, 'courses' => $courses]);
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
            'currhours' => 'required|numeric'
        ]);

        $waiting_list_entry = new Waiting_List;
        $waiting_list_entry->list_number = rand(1,10000);
        $waiting_list_entry->id = $request->input('studID');
        $waiting_list_entry->email = $request->input('studemail');        
        $waiting_list_entry->first_name = $request->input('first_name');
        $waiting_list_entry->last_name = $request->input('last_name');
        $waiting_list_entry->major = $request->input('studmajor');
        $waiting_list_entry->course_number = $request->input('course_num');
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
