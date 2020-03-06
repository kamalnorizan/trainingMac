<?php

namespace App\Http\Controllers;

use App\Tboa;
use App\Cert;
use Auth;
use Illuminate\Http\Request;

class TboaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tboas = Tboa::where('user_id',Auth::user()->id)->get();
        return view('tboa.index',compact('tboas'));
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
        $cert = Cert::where('cert_num',$request->cert_num)->first();
        if($cert){
            if($cert->ic_ibu == Auth::user()->ic_number || $cert->ic_bapa == Auth::user()->ic_number){
                $tboa = new Tboa();
                $tboa->cert_id = $cert->id;
                $tboa->user_id = Auth::user()->id;
                $tboa->save();
                flash('Permohonan anda akan di nilai oleh pegawai.')->success()->important();
            }else{
                flash('Rekod tidak dapat dipaparkan.')->error()->important();
            }
        }else{
            flash('Rekod sijil lahir tidak dijumpai. Sila masukkan No. sijil lahir yang betul')->error()->important();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tboa  $tboa
     * @return \Illuminate\Http\Response
     */
    public function show(Tboa $tboa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tboa  $tboa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tboa $tboa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tboa  $tboa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tboa $tboa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tboa  $tboa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tboa $tboa)
    {
        //
    }
}
