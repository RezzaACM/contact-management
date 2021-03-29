<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class ContactController extends Controller
{
    public function index(){
        return view('dashboard.contact-management');
    }

    public function store(Request $request){
        try {
            $customer = new Contact();
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->email = $request->input('email');
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => "Successful insert"
            ]);
        } catch (\Throwable $th) {
            return response()->json($th,500);
        }
    }

    public function customers(){
        $customer = Contact::all();
        return $customer;
    }

    public function delete(Request $request){
        try {
            DB::table('customers')->where('id', '=', $request->input('id'))->delete();
            return response()->json([
                'status' => true,
                'message' => "Successful deleted!"
            ]);
        } catch (\Throwable $th) {
            return response()->json($th,500);
        }
    }

    public function customer($id){
        $customer = Contact::where('id',$id)->get()->first();
        return $customer;
    }

    public function update(Request $request){
        try {
            $customer = Contact::find($request->input('id'));
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->email = $request->input('email');
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => "Successful insert"
            ]);
        } catch (\Throwable $th) {
            return response()->json($th,500);
        }
    }
}
