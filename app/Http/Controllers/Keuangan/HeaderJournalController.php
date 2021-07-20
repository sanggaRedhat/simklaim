<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\HeaderJournal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class HeaderJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keuangan.header.index');
    }

    public function jsonheaderbytahun(){
        return DataTables::of(HeaderJournal::where('status_header_id',1)->get())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="'.route('keuangan.jurnal.show',['jurnal'=>Crypt::encrypt($query->id)]).'" class="btn btn-xs btn-block btn-primary">Pilih</a>';    
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
        ->addColumn('hapus',function($query){
            if ($query->status_header_id == 1) {
                return '<a href="javascript:;" class="btn btn-xs btn-danger btn-block" onclick="hapus('."'".route('keuangan.header.destroy', ['header' => Crypt::encrypt($query->id)])."'".')" >Hapus</a>';    
            }
            
        })
        ->addColumn('tahun',function($query){
            return date('Y',strtotime($query->created_at));
        })
        ->rawColumns(['pilih','status','tahun','hapus'])
        ->make(true);
    }

    public function jsonotorizfirst(){
        return DataTables::of(HeaderJournal::where('status_header_id',2)->get())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="'.route('otorization.first.show',['first'=>Crypt::encrypt($query->id)]).'" class="btn btn-xs btn-block btn-primary">Pilih</a>';    
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
        ->addColumn('tahun',function($query){
            return date('Y',strtotime($query->created_at));
        })
        ->rawColumns(['pilih','status','tahun','hapus'])
        ->make(true);
    }

    public function test($id){
        $code = Code::find($id);

        return response()->json(['code'=>$code->code,'keterangan'=>$code->keterangan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        HeaderJournal::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'status_header_id' => 1
        ]);

        return redirect()->route('keuangan.header.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeaderJournal  $headerJournal
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderJournal $headerJournal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderJournal  $headerJournal
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderJournal $headerJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderJournal  $headerJournal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderJournal $headerJournal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderJournal  $headerJournal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header = HeaderJournal::find(Crypt::decrypt($id));
        $header->delete();

        return response()->json(['status'=>true]);
    }
}
