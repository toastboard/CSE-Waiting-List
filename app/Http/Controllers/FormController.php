<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.form');
    }

    public function store(Request $request)
    {
        // return view('pages.test')->with('test', $request->input('test'));

        $this->validate($request, [
            'first_name' => 'required'
        ]);

        $waiting_list_entry = new Waiting_List;
        $waiting_list_entry->list_number = rand(1,10000);
        $waiting_list_entry->foreign_id = $request->input('first_name');
    }
}
