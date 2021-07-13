<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Vinputjurnal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
        // return view('info');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nominal = str_replace('Rp. ','',$request->nominal);
        $fix = str_replace(',','',$nominal);
        Journal::create([
            'code_id' => 1,
            'header_journals_id' => 8,
            'debet' => $fix,
            'kredit' => 0,
            'keterangan' => $request->keterangan,
            'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$request->tanggal)
        ]);

        return response()->json(['status'=>true,'msg'=>'Berhasil Disimpan']);
    }

    public function storeJurnal(Request $request,$do){
        $keterangan = $request->keterangan;
        $nomi = $request->nominal;
        $debet = $request->debet;
        $kredit = $request->kredit;
        $tanggal = $request->tanggal;
        $header = Crypt::decrypt($request->id);

        $i = 0;
        while ($keterangan[$i] != '') {
            $uniq = hexdec(uniqid());
            $nominal = str_replace('Rp. ','',$nomi[$i]);
            $fix = str_replace(',','',$nominal);
            if ($request->debet != '') {
                Journal::create([
                    'code_id' => $debet[$i],
                    'header_journals_id' => $header,
                    'debet' => $fix,
                    'kredit' => 0,
                    'keterangan' => $keterangan[$i],
                    'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$tanggal[$i]),
                    'linking' => $uniq
                ]);    
            }
            if($request->kredit != ''){
                Journal::create([
                    'code_id' => $kredit[$i],
                    'header_journals_id' => $header,
                    'kredit' => $fix,
                    'debet' => 0,
                    'keterangan' => $keterangan[$i],
                    'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$tanggal[$i]),
                    'linking' => $uniq
                ]);
            }

            $i++;
        }
        
        return response()->json(['status'=>true,'msg'=>'Berhasil Disimpan','header'=>Crypt::encrypt($header)]);
        
    }

    public function getDetailHeader($id){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Journal::where('header_journals_id',Crypt::decrypt($id))->get();
        if (count($transaksi) >= 1) {
            $data['id'] = Crypt::decrypt($id);
            // $data['transaksi'] = Vinputjurnal::where('header_journals_id',Crypt::decrypt($id))->get();
            $data['totaldebet'] = Journal::where('header_journals_id',Crypt::decrypt($id))->sum('debet');
            $data['totalkredit'] = Journal::where('header_journals_id',Crypt::decrypt($id))->sum('kredit');
            return view('transaksi.jurnal',$data);
        }else{
            $data['id'] = $id;
            return view('transaksi.create',$data);
        }
    }

    public function addmore($id){
        $data['id'] = $id;
        return view('transaksi.create',$data);
    }

    public function jurnal($id){
        return DataTables::of(Journal::where('header_journals_id',$id)->get())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="'.route('transaksi.jurnal.edit',['jurnal'=>$query->linking]).'" class="btn btn-sm btn-block btn-primary"><i class="fa fa-info"></i></a>';    
        })
        ->addColumn('hapus',function($query){
            return '<a href="javascript:;" class="btn btn-sm btn-danger btn-block" onclick="hapus('."'".route('transaksi.jurnal.destroy', ['jurnal' => $query->linking])."'".')" ><i class="fa fa-trash"></i></a>';    
        })
        ->addColumn('code',function($query){
            return $query->code->code;
        })
        ->addColumn('tanggal',function($query){
            return date('d/m/Y',strtotime($query->tanggal_transaksi));
        })
        ->addColumn('debet',function($query){
            return number_format($query->debet,'2','.',',');
        })
        ->addColumn('kredit',function($query){
            return number_format($query->kredit,'2','.',',');
        })
        ->rawColumns(['pilih','debet','hapus','tanggal'])
        ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['transaksi'] = Vinputjurnal::where('linking',$id)->get();
        $data['id'] = $id;
        $d = Vinputjurnal::where('linking',$id)->first();
        $data['idh'] = $d->header_journals_id;
        // $data['totaldebet'] = Journal::where('header_journals_id',Crypt::decrypt($id))->sum('debet');
        // $data['totalkredit'] = Journal::where('header_journals_id',Crypt::decrypt($id))->sum('kredit');
        return view('transaksi.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $keterangan = $request->keterangan;
        $nomi = $request->nominal;
        $debet = $request->debet;
        $kredit = $request->kredit;
        $tanggal = $request->tanggal;
        $nominal = str_replace('Rp. ','',$nomi);
        $fix = str_replace(',','',$nominal);

        $s = Journal::where('linking',Crypt::decrypt($id))->get();

        foreach ($s as $key) {
            if ($key->debet != 0) {
                $j = Journal::find($key->id);
                $j->update([
                    'code_id' => $debet,
                    'debet' => $fix,
                    'kredit' => 0,
                    'keterangan' => $keterangan,
                    'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$tanggal),
                ]);    
            }
            if($key->kredit != 0){
                $j = Journal::find($key->id);
                $j->update([
                    'code_id' => $kredit,
                    'kredit' => $fix,
                    'debet' => 0,
                    'keterangan' => $keterangan,
                    'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$tanggal),
                ]);
            }

            $header = $key->header_journals_id;
        }

        return redirect()->route('transaksi.jurnal.show',['jurnal'=>Crypt::encrypt($header)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Journal::where('linking',$id)->first();
        $header = Journal::where('linking',$id);
        // $id = $header->header_journals_id;
        $header->delete();

        return response()->json(['status'=>true,'id'=>$t->header_journals_id]);
    }

    public function ceksaldo($id){
        $e = Journal::where('header_journals_id',$id)->first();
        // dd($e);
        if ($e === null) {
            return response()->json(['kredit'=>number_format(0,2,".",","),'debet'=>number_format(0,2,".",","),'saldo'=>number_format(0,2,".",",")]);
        }
        else {
            $totaldebet = Journal::where('header_journals_id',$id)->sum('debet');
            $totalkredit = Journal::where('header_journals_id',$id)->sum('kredit');
    
            return response()->json(['kredit'=>number_format($totalkredit,2,".",","),'debet'=>number_format($totaldebet,2,".",","),'saldo'=>number_format($totaldebet-$totalkredit,2,".",",")]);    
        }
        
    }
}
