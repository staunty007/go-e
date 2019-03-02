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
            'is_activated' => $request->input('is_activated', '0'),
            'password' => bcrypt('password'),
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
           // $request->session()->flash('Agent Created Successfully');
            return redirect()->route('agents.index')->with('status', 'Agent Created Successfully');
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
        $request->validate([
            'first_name'=>'required|string|max:191',
            'last_name'=> 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|numeric',
            'address' => 'sometimes'
        ]);

         DB::table('users')->where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'is_activated' => $request->input('is_activated', '0'),
            'updated_at' => new Carbon('now')
        ]);

        $update_bio = DB::table('agent_biodatas')->where('user_id',$id)->update([
        'address' => $request->address
        ]);

        if ($update_bio) {
            return redirect()->route('agents.index')->with('status', 'Agent Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->route('agents.index')->with('status', 'Agent Deleted');
    }
}
