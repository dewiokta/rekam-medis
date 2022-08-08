<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $obat = Obat::where('nama','LIKE','%'.$request->search.'%')
            ->orderBy("id",'desc')
            ->paginate(5);
        }else{
            $obat = Obat::orderBy("id",'desc')->paginate(10);
        }
        return view ('dashboard.obat.index', compact('obat'));
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
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        Obat::create($validated);

        // $user->save();
        return redirect('/dashboard/obat')->with('succsess','Data Saved');
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
        $obat = Obat::find($id);
        
        return view('dashboard.obat.edit', ['data'=>$obat]); 
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
        $obat = Obat::find($id);
        $obat->nama=$request->nama;
        $obat->harga=$request->harga;

        $obat->save();
        return redirect('/dashboard/obat')->with('succsess','Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obt = Obat::destroy($id);
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
