<?php

namespace App\Http\Controllers;

use App\Models\hp;
use Illuminate\Http\Request;

class HpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hps = hp::all();
        return view('hps.index',compact('hps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'merk'  => 'required',
            'type'  => 'required',
            'warna'  => 'required',
            'harga'  => 'required',
        ]);
        Hp::create($request->all());
        return redirect()->route('hp.index')
                        ->with('success','hp berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hp $hp)
    {
        return view('hps.show',compact('hp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hp $hp)
    {
        return view('hps.edit',compact('hp'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hp $hp)
    {
         request()->validate([
            'merk'  => 'required',
            'type'  => 'required',
            'warna'  => 'required',
            'harga'  => 'required',
        ]);
        $hp->update($request->all());
        return redirect()->route('hp.index')
                        ->with('success','Hp berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hp $hp)
    {
        $hp->delete();
        return redirect()->route('hp.index')
        ->with('success','Hp berhasil dihapus');
    }
}
