<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\HeaderJournal;
use App\Models\Vsaldo;
use App\Models\Vsaldodebetkredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AuthorizeMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keuangan.header.index-authorize-m');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $header = Crypt::decrypt($id);
        $data['id'] = $id;
        $data['codes'] = Code::all();
        $data['saldo'] = Vsaldo::where('header_journals_id',$header)->get();
        $data['saldodebetkredit'] = Vsaldodebetkredit::where('header_journals_id',$header)->first();
        $data['header'] = HeaderJournal::find($header);
        return view('keuangan.transaksi.authorize.index',$data);
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
