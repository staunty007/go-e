<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\CustomerBiodata;
use DB;
use Carbon\Carbon;
class UserManagerController extends Controller
{
    private $prefix = "users.admin.manage.customers.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all customers
        $users = User::where('role_id',0)->with('customer')->get();
        // return $users;
        return view($this->prefix.'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check if email address is not registered already
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);
        // Insert into database and return the id
        $userId = DB::table('users')->insertGetId([
            'role_id' => 0,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt('password'),
            'is_activated' => $request->activated == 1 ? 1 : 0,
            'created_at' => new Carbon('now'),
            'updated_at' => new Carbon('now')
        ]);
        
        // Insert into Customer Biodata
        $updatebio = DB::table('customer_biodatas')->insert([
            'user_id' => $userId,
            'address' => $request->address
        ]);
        
        if($updatebio) {
            // $request->session()->flash('Customer Created Successfully');
            return redirect()->route('users.index')->with('status', 'User Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return $user;
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

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->is_activated = $request->input('is_activated', '0');
        $user->save();

        $update_bio = DB::table('customer_biodatas')->where('user_id',$id)
                                                    ->update(['address' => $request->address]);

        if($update_bio) {
            return redirect()->route('users.index')->with('status', 'User Updated Successfully');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User Deleted');

    }

    public function customerPayment($meter_no)
    {
        $customer_pay = Payment::where('meter_no',$meter_no)->first()->get();
         //return $customer_pay;
        return view($this->prefix.'customer_payments', compact('customer_pay'));

    }
}
