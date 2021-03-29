<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole()
    {
        return DB::table('roles')->select('name')->where('id', '=', Auth::user()->role_id)->get()->first();
    }

    public function showAllUser($agent=false){
        if(!$agent){
            $sql = DB::table('users as a')->select(
                'a.id',
                'a.email',
                'b.name as role_name'
            )
            ->join('roles as b', 'b.id','=','a.role_id')
            ->get();
        }else{
            $sql = DB::table('users as a')->select(
                'a.id',
                'a.email',
                'a.role_id',
                'b.name as role_name',
            )
            ->join('roles as b', 'b.id','=','a.role_id')
            ->where('a.role_id','=', 2)
            ->get();
        }

        return $sql;
    }
}
