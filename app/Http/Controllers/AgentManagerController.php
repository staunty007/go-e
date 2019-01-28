<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Carbon\Carbon;
use App\AgentBiodata;



class AgentManagerController extends Controller
{
    private $prefix = "users.admin.manage.agents.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('role_id', 2)->with('agent')->get();
        // return $agents;
        return view($this->prefix . 'index')->withAgents($agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        // Insert into database and return the id
        $userId = DB::table('users')->insertGetId([
            'role_id' => 2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt('password'),
            'is_activated' => 1,
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now')
        ]);
        
        // Insert into Agent Biodata
        $updatebio = DB::table('agent_biodatas')->insert([
            'user_id' => $userId,
            'agent_id' => $request->agent_id,
            'address' => $request->address
        ]);

        if ($updatebio) {
            $response()->session('flash', 'Agent Created Successfully');
            return redirect()->route('agents.index');
        }
        return back();
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
        $agent = User::where('id', $id)->with('agent')->first();
        return $agent;
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
        return User::findorFail($id);
    }
}
