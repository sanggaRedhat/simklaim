<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.account.index');
    }

    public function jsonUserAll(){
        return DataTables::of(User::all())
        ->addIndexColumn()
        ->addColumn('edit',function($query){
            return '<a href="'.route('admin.user.edit',['user'=>Crypt::encrypt($query->id)]).'" class="btn btn-xs btn-block bg-primary">Edit</a>';
        })
        ->addColumn('reset',function($query){
            return '<a href="'.route('admin.changepassword',['user'=>Crypt::encrypt($query->id)]).'" class="btn btn-xs btn-block bg-danger">Change Password</a>';
        })
        ->addColumn('setrole',function($query){
            return '<a href="'.route('admin.user.edit',['user'=>$query->id]).'" class="btn btn-xs btn-block bg-warning">Set Role</a>';
        })
        ->rawColumns(['edit','reset','setrole'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.account.create',['roles'=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->except(['_token','roles']));
        $user->roles()->sync($request->role);

        return redirect()->route('admin.user.index');
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
        return view('admin.user.account.edit',['user'=>User::find(Crypt::decrypt($id))]);
    }

    public function changepassword($id)
    {
        return view('admin.user.account.changepassword',['user'=>User::find(Crypt::decrypt($id))]);
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
        $user = User::find(Crypt::decrypt($id));
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);

        return redirect()->route('admin.user.index');
    }

    public function updatepassword(Request $request, $id)
    {
        $user = User::find(Crypt::decrypt($id));
        $user->update([
            'password'=>$request->name,
            'email'=>$request->email
        ]);

        return redirect()->route('admin.user.index');
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
