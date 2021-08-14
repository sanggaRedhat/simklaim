<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\HeaderJournal;
use App\Models\ValidationFinance;
use App\Models\Vsaldo;
use App\Models\Vsaldodebetkredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

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
        $data['code_dummy'] = Code::where('keterangan','Dummy')->first();
        $data['header_dummy'] = HeaderJournal::where('nama','Dummy')->first();
        return view('keuangan.transaksi.authorize.index',$data);
    }

    public function authorizeJournal(Request $request){
        if (Gate::allows('role-validation-finance')) {
            ValidationFinance::create([
                'header_journal_id'=>Crypt::decrypt($request->idheader),
                'user_id'=>Auth::user()->id
            ]);

            $header = HeaderJournal::find(Crypt::decrypt($request->idheader));
            $header->update([
                'status_header_id'=>3
            ]);
            return response()->json(['status'=>true]);
        }else{
            return response()->json(['status'=>false]);
        }
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
