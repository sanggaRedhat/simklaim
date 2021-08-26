<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\GroupCode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['group'] = GroupCode::all();
        return view('keuangan.admin.index-akun',$data);
    }

    public function jsonallcode(){
        return DataTables::of(Code::all())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="javascript:;" onclick="edit('.$query->id.')" class="btn btn-sm btn-block btn-primary">Edit</a>';
        })
        ->addColumn('groupname',function($query){
            $name = GroupCode::find($query->group_code_id);
            return $name->name;
        })
        ->rawColumns(['pilih','groupname'])
        ->make(true);
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
        $rgbColor = array();

        //Create a loop.
        foreach(array('r', 'g', 'b') as $color){
            //Generate a random number between 0 and 255.
            $rgbColor[$color] = mt_rand(0, 255);
        }

        $rd = "rgb(".$rgbColor['r'].", ".$rgbColor['g'].", ".$rgbColor['b'].")";

        Code::create([
            'code'=>$request->kode,
            'keterangan'=>$request->keterangan,
            'set'=>$request->typekode,
            'group_code_id'=>$request->grup,
            'color' => $rd
        ]);

        return response()->json(['status'=>true]);
    }

    public function banks(){
        $data['code'] = Code::all();
        return view('keuangan.admin.index-bank',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
