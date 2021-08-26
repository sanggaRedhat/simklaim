<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\HeaderJournal;
use App\Models\Vsaldo;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class PrintAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keuangan.cetak.index');
    }

    public function jsonreleased(){
        return DataTables::of(HeaderJournal::where('status_header_id',3)->get())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="'.route('keuangan.cetak-a.show',['cetak_a'=>Crypt::encrypt($query->id)]).'" target="_blank" class="btn btn-xs btn-block btn-primary">Pilih</a>';    
        })
        ->addColumn('status',function($query){
            if ($query->status_header_id == 1) {
                return '<span class="badge badge-success">Draft</span>';
            }if ($query->status_header_id == 2) {
                return '<span class="badge badge-warning">Permintaan Otorisasi</span>';
            }else{
                return '<span class="badge badge-danger">Dirilis</span>';
            }
            
        })
        ->rawColumns(['pilih'])
        ->make(true);
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
        $idheader = Crypt::decrypt($id);
        $data['header'] = HeaderJournal::find(Crypt::decrypt($id));
        $data['saldo'] = Vsaldo::where('header_journals_id',$idheader)->get();
        $pdf = PDF::loadview('keuangan.cetak.cpersetujuan',$data);
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
