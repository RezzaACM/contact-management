<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Assign extends Model
{
    use HasFactory;

    protected $table = "follow_up";


    public function getAllAssigned(){
        $sql = DB::table('follow_up as a')->select(
            'a.id',
            'a.status',
            'a.user_name',
            'b.email as email',
            'c.name as customer_name'
        )
        ->join('users as b','b.id','=','a.agent_id')
        ->join('customers as c','c.id','=','a.customer_id')
        ->get();

        return $sql;
    }

    public function myAssign(){
        $sql = DB::table('follow_up as a')->select(
            'a.id',
            'a.status',
            'a.user_name',
            'b.email as email',
            'c.name as customer_name'
        )
        ->join('users as b','b.id','=','a.agent_id')
        ->join('customers as c','c.id','=','a.customer_id')
        ->where('agent_id','=', Auth::user()->id)
        ->get();

        return $sql;
    }
}
