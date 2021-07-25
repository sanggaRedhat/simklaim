<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CodeController extends Controller
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

    public function loadjson(){
        return view('code.load');
    }

    public function jsoncode(){
        return DataTables::of(Code::all())
        ->addIndexColumn()
        ->addColumn('pilih',function($query){
            return '<a href="javascript:;" onclick="tes('."'".$query->id."'".','."'".$query->code."'".')" class="btn btn-xs btn-block btn-primary">Pilih</a>';    
        })
        ->rawColumns(['pilih'])
        ->make(true);
    }

    public function getcodes($search){
        $hasil = Code::where('keterangan','ilike','%'.$search.'%')->get();

        if (count($hasil) > 0) {
            $key = 0;
            foreach ($hasil as $keys) {
                $list[$key]['id']=$keys->id;
                $list[$key]['name']=$keys->keterangan;
                $list[$key]['code']=$keys->code;
                $list[$key]['label']=$keys->code." - ".$keys->keterangan;

                $key++;
            }

            return response()->json($list);
        }else{
            return response()->json('Tidak Ditemukan');
        }
        
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
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit(Code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Code $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Code $code)
    {
        //
    }
}
