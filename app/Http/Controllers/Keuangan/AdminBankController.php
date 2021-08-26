<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Code;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function jsonallbank(){
        return DataTables::of(Bank::all())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="javascript:;" onclick="edit('.$query->id.')" class="btn btn-sm btn-block btn-primary">Edit</a>';
        })
        ->addColumn('code',function($query){
            $name = Code::find($query->code_id);
            return $name->code;
        })
        ->rawColumns(['pilih','code'])
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
        Bank::create([
            'name'=>$request->nama,
            'address'=>$request->alamat,
            'code_id'=>$request->code
        ]);

        return response()->json(['status'=>true]);
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
