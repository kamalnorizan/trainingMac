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
        $cert = Cert::create($request->all());
        // $cert = new Cert();
        // $cert->cert_num = $request->cert_num;
        // $cert->name = $request->name;
        // $cert->ic_ibu = $request->ic_ibu;
        // $cert->ic_bapa = $request->ic_bap;
        // $cert->date_birth = $request->date_birth;
        // $cert->save();

        flash('You have successfully insert the record. Cert number is '.$cert->id)->success()->important();
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
        // $cert = Cert::find(decrypt($cert));

        return view('cert.edit',compact('cert'));
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
        $cert->update($request->all());
        flash('You have successfully update the record.')->success()->important();
        return redirect('/cert');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cert  $cert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cert $cert)
    {
        $cert->delete();
        flash('Record deleted successfully.')->success()->important();
        return back();
    }
}
