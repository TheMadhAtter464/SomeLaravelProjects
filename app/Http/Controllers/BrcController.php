<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use PDF;
use App\Brc;
use App;

class BrcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
        'brcs.*' => 'required|distinct|unique:brcs,brcs'//add 12char validation

      ]);


      $brcArr = $request -> get('brcs');
      for($i=0; $i<=19; $i++){
        $brcNew = new Brc;
        $brcNew->brcs=$brcArr[$i];
        $brcNew->save();
      }
        return redirect('/brcs/show')->with('success', 'Code has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brcs = BRC::orderBy('brcs', 'desc')->take(20)->get();//take(20)
        return view ('brc.show', compact('brcs'));

    }

    public function generatePDF(){
      $brcs = BRC::orderBy('brcs', 'desc')->take(20)->get();
      $pdf = App::make('dompdf.wrapper');
      $pdf->loadView('brc.show',compact('brcs'))->setPaper('a4', 'landscape');
      return $pdf->stream();
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
