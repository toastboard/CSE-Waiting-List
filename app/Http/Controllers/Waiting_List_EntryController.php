<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waiting_List_Entry;
use App\Models\Course;
use App\Models\User;
use App\Http\PagesController;
use Auth;

class Waiting_List_EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->msuid;
        $entries = Waiting_List_Entry::where('msuid', $user_id)->get();
        return view('waiting_list_entries.index', ['entries'=>$entries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($submit_arr=null)
    {
        $curryear = date('Y');
        $msuid = Auth::user()->msuid;
        $email = Auth::user()->email;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $major = Auth::user()->major;
        $courses = Course::all()->pluck('full_name', 'full_name');

        $return_arr = ['curryear' => $curryear, 'msuid' => $msuid, 'email' => $email, 'first_name' => $first_name, 'last_name' => $last_name, 'major' => $major, 'courses' => $courses];

        if (!is_null($submit_arr))
        {
            $return_arr = array_merge($return_arr, $submit_arr);
        }

        return view('pages.form', $return_arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curryear = date('Y');
        $this->validate($request, [
            'studID' => 'required|numeric',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'studemail' => 'required|email',
            'course_num' => 'required',
            'currhours' => 'required|numeric',
            'requiredforgrad' => 'required',
            'graddate.1' => 'required|numeric|min:' . strval($curryear) . '|max:' . strval($curryear + 8),
            'studmajor'=> 'required|alpha'
        ]);

        $waiting_list_entry = new Waiting_List_Entry;
        $waiting_list_entry->list = rand(1,10000);
        $waiting_list_entry->msuid = $request->input('studID');
        $waiting_list_entry->email = $request->input('studemail');        
        $waiting_list_entry->first_name = $request->input('first_name');
        $waiting_list_entry->last_name = $request->input('last_name');
        $waiting_list_entry->major = $request->input('studmajor');
        $waiting_list_entry->course_selection = $request->input('course_num');
        $waiting_list_entry->type = $request->input('overtype');
        $waiting_list_entry->campus = $request->input('campus');
        // Graduation date (graduation_time) needs to be constructed
        $graddate = $request->input('graddate');
        $waiting_list_entry->graduation_time = $graddate[0] . ' ' . $graddate[1];
        $waiting_list_entry->current_hours = $request->input('currhours');
        $waiting_list_entry->is_required = $request->input('requiredforgrad');
        $waiting_list_entry->comments = $request->input('comments');
        $waiting_list_entry->save();

        $submit_arr = ["course_num"=>$request->input('course_num'), "campus"=>$request->input('campus'), "overtype"=>$request->input('overtype'), "comments"=>$request->input('comments')];

        return $this->create($submit_arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $list_num
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($list_num)
    {
        $entry = Waiting_List_entry::find($list_num);
        return view('waiting_list_entries.show', ['entry'=>$entry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
