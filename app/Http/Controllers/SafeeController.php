<?php

namespace App\Http\Controllers;

use App\Form;
use App\City;
use Illuminate\Http\Request;
use DB;

class SafeeController extends Controller
{
    public function form()
    {
        $dbtable =  City::all();
       // dd($dbtable);
        return view('SafeeFile.SafeeFile',['data'=>$dbtable]);
    }
    public function submitForm(Request $data)
    {
    
        $data->validate([
            'name' => 'required',
            'lname' => 'required'
        ]);

        Form::create($data->all());
        return redirect()->back()->with('message', 'IT WORKS!');

    }
    public function listingform()
    {
       $dbtable =  DB::table('form')->join('city', 'form.city', '=', 'city.id')->select('form.*','city.name as cname')->get();
       
       return view('SafeeFile.listing', ['data' => $dbtable]);
    
    }
    public function edituser($var)
    {
       // $dbtable =  Form::where('id',$var)->first();
         $dbtableCity =  City::all();
        $dbtable =  DB::table('form')->join('city', 'form.city', '=', 'city.id')->where('form.id',$var)->select('form.*','city.name as cname')->first();
        // dd($dbtable);
        
        return view('SafeeFile.edituser', ['data' => $dbtable,'city' => $dbtableCity]);
    }
    public function updateuser(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'lname' => 'required',
            'city' => 'required'
        ]);
        
        Form::where("id",$data->id)->update(array("name"=>$data->name,"lname"=> $data->lname,"city"=> $data->city));
        return redirect()->back()->with('message', 'Form Has Been  Updated!');
    }
}
