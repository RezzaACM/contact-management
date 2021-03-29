<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\Contact;
use App\Models\FollowUpLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AgentAssignmentController extends Controller
{
    public function index(){
        $assign = new Assign();
        $data['assigns'] = $assign->getAllAssigned();
        return view('dashboard.assignment-management',$data);
    }

    public function assignUser(){
        $user = new User();
        $data['agents'] = $user->showAllUser(true);
        $data['customers'] = Contact::all();
        return view('dashboard.form-assign',$data);
    }

    public function addAssign(Request $request){
        $getMaxId = DB::table('follow_up')->select('id')->orderBy('id','DESC')->limit(1)->get()->toArray();
        $id = 0;
        if(empty($getMaxId)){
            $id +=1;
        }else{
            $id = $getMaxId[0]->id + 1;
        }
        
        $assign = new Assign();
        $log = new FollowUpLog();
        
        $customerName = Contact::select('name')->where('id','=',$request->customer)->get()->first();
        $agentName = User::select('email')->where('id','=',$request->agent)->get()->first();


        $assign->id = $id;
        $assign->user_name = Auth::user()->email;
        $assign->agent_id = $request->agent;
        $assign->customer_id = $request->customer;
        $assign->status = 'uncontacted';
        $assign->save();

        $log->follow_up = $id;
        $log->user_id = $request->agent;
        $log->user_name = $agentName->email;
        $log->customer_id = $request->customer;
        $log->customer_name = $customerName->name;
        $log->status = 'uncontacted';
        $log->remarks = 'assigned';
        $log->save();


        return redirect('/assignment-management')->with('success', 'User created successfully.');


    }
}
