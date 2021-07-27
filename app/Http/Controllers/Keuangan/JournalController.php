<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\HeaderJournal;
use App\Models\Journal;
use App\Models\ViewTransaksi;
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
            'header_journals_id' => Crypt::decrypt($request->id),
            'debet' => $fix,
            'kredit' => $fix,
            'keterangan' => $request->keterangan,
            'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$request->tanggal),
            'debet_code_id' => $request->debet,
            'kredit_code_id' => $request->kredit
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

    public function jsontransaksi($id){
        return DataTables::of(ViewTransaksi::where('header_journals_id',$id)->get())
        ->addIndexColumn()
        ->addColumn('tanggal',function($query){
            return date('d/m/Y',strtotime($query->tanggal_transaksi));
        })
        ->addColumn('edit',function($query){
            return '<a href="javascript:;" onclick="edit('.$query->id.')" class="btn btn-sm btn-block btn-primary">Edit</a>';
        })
        ->addColumn('delete',function($query){
            return '<a href="javascript:;" onclick="delet('.$query->id.')" class="btn btn-sm btn-block btn-danger">Delete</a>';
        })
        ->addColumn('code',function($query){
            return '<a href="javascript:;" onclick="getcode('."'".$query->code."'".')" class="btn btn-sm btn-block btn-default">'.$query->code.'</a>';
        })
        ->addColumn('debet',function($query){
            if ($query->number == 1) {
                return number_format($query->amount,'2','.',',');
            }else{
                return 0;
            }
        })
        ->addColumn('kredit',function($query){
            if ($query->number == 2) {
                return number_format($query->amount,'2','.',',');
            }else{
                return 0;
            }
        })
        ->addColumn('keterangan',function($query){
            if ($query->number == 2) {
                return '&ensp;&ensp;&ensp;'.$query->keterangan;
            }else{
                return $query->keterangan;
            }
        })
        ->rawColumns(['debet','kredit','hapus','tanggal','keterangan','edit','delete','code'])
        ->make(true);
    }

    public function getdatatransaksi($id){
        $transaksi = Journal::find($id);

        $code_debet = Code::find($transaksi->debet_code_id);
        $code_kredit = Code::find($transaksi->kredit_code_id);

        return response()->json([
            'status'=>true,
            'keterangan'=>$transaksi->keterangan,
            'nominal'=>$transaksi->debet,
            'tanggal'=>date('d/m/Y',strtotime($transaksi->tanggal_transaksi)),
            'debet_code'=>$code_debet->id,
            'kredit_code'=>$code_kredit->id,
            'id'=>$transaksi->id
        ]);
    }

    public function getcodeinfo($id){
        $code = Code::where('code',$id)->first();

        return response()->json(['status'=>true,'code'=>$code->code,'keterangan'=>$code->keterangan]);
    }

    public function getDetailHeader($id){

    }

    public function makeRelease($id){
        $dec_id = Crypt::decrypt($id);

        $header = HeaderJournal::find($dec_id);
        $header->update([
            'status_header_id'=>2
        ]);

        return redirect()->route('transaksi.header.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['id'] = $id;
        $data['codes'] = Code::all();
        return view('keuangan.transaksi.create',$data);
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
        $tanggal = $request->tanggal;
        $nominal = str_replace('Rp. ','',$nomi);
        $fix = str_replace(',','',$nominal);

        $j = Journal::find($id);
        $j->update([
            'debet' => $fix,
            'kredit' => $fix,
            'keterangan' => $keterangan,
            'tanggal_transaksi' => Carbon::createFromFormat('d/m/Y',$tanggal),
        ]);

        return response()->json(['status'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi= Journal::find($id);
        // $id = $header->header_journals_id;
        $transaksi->delete();

        return response()->json(['status'=>true]);
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
