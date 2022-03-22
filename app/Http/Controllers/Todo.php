<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Todo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos')->get();
        return view('app', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:200',
            'title'=> 'required|max:150',
            'description'=> 'required|max:200',
        ]);

        DB::table('todos')->insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect('/')->with('status','Tâche Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
            'name' => 'required|max:200',
            'title' => 'required|max:200',
            'description' => 'required|max:200',
        ]);

        DB::table('todos')->where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/')->with('status', 'Tâche mise à Jour!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('todos')->where('id', $id)->delete();

        return redirect('/')->with('status', 'Tâche Supprimer!');
    }
}
