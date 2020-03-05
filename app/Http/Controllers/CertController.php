<?php

namespace App\Http\Controllers;

use App\Cert;
use App\User;
use DB;
use Illuminate\Http\Request;

class CertController extends Controller
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
        $certs=Cert::latest()->paginate(10);
        return view('cert.index',compact('certs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $icPemohon = User::select(DB::raw("CONCAT(ic_number, '-', name) as title"),'ic_number')
                    ->pluck('title','ic_number');

        return view('cert.create',compact('icPemohon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cert::create($request->all());
        return redirect('/cert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function show(Cert $cert)
    {
        //
        dd($cert);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function edit(Cert $cert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cert $cert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cert $cert)
    {
        //
    }
}
