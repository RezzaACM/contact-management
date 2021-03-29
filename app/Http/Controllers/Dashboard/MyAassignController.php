<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use Illuminate\Http\Request;

class MyAassignController extends Controller
{
    public function index()
    {
        $assign = new Assign();
        $data['myAssigns'] = $assign->myAssign();
        return view('dashboard.my-assignment',$data);
    }

    public function update(Request $request){
        $assign = Assign::find($request->input('id'));
        
    }
}
