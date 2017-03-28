<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.form');
        return redirect()->route('tables.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Table::create([
            'name' => $request->get('name'),
            'min_amount' => $request->get('min_amount'),
            'max_amount' => $request->get('max_amount'),
            'photo' => $request->get('photo')
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(table $table)
    {
        $tables = Table::find($table);
        return view('table.show', compact('tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view('table.form', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Table::find($id)->update($request->all());
        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Table::find($id)->delete();
        return redirect()->route('tables.index');
    }
}
