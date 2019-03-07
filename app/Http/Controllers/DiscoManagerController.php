<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiscoManagerController extends Controller
{

    private $prefix = "users.admin.manage.discos.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all customers
        $discos = User::where('role_id',3)->with('customer')->get();
        return view($this->prefix.'index', compact('discos'));
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
        //return $request->all();
        $request->validate([
            'first_name'=>'required|string|max:191',
            'last_name'=> 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|numeric',
        ]);

         DB::table('users')->insertGetId([
            'role_id' => 3,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'is_activated' => $request->input('is_activated', '0'),
            'password' => bcrypt('password'),
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now')
        ]);

        return redirect()->route('discos.index')->with('status', 'Discos Created Successfully');
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
        $request->validate([
            'first_name'=>'required|string|max:191',
            'last_name'=> 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|numeric',
        ]);

         DB::table('users')->where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'is_activated' => $request->input('is_activated', '0'),
            'updated_at' => new Carbon('now')
        ]);

        return redirect()->route('discos.index')->with('status', 'Agent Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disco = User::findOrFail($id);
        $disco->delete();
        return redirect()->route('discos.index')->with('status','Deleted Succesfully');
    }
}
