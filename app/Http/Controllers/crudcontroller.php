<?php

namespace App\Http\Controllers;

use Request;
use Carbon\Carbon;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use DB;
use Session;

class crudcontroller extends Controller
{
    public function insertData()
    {
        $data = Request::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at']=Carbon::now()->toDateTimeString();
        if(Request::has('social'))
        {
            $data['social']= implode(',',$data['social']);
        }
        if(Request::hasFile('image')){
            $data['image'] =$this->uploadimage($tbl,$data['image']);
        }
        if(Request::has('category_id'))
        {
            $data['category_id']= implode(',',$data['category_id']);
        }
        DB::table($tbl)->insert($data);
        if($tbl == 'messages')
        {
            session::flash('message','Thank You for messaging us.please wait !It will take some time');
        }
        else
        {
            session::flash('message','Data inserted successfully');
        }
        return redirect()->back();
        //print_r($tbl);
    }

    public function updateData()
    {
        $data = Request::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at']=Carbon::now()->toDateTimeString();
        if(Request::has('category_id'))
        {
            $data['category_id']= implode(',',$data['category_id']);
        }
        DB::table($tbl)->where(key($data),reset($data))->update($data);
        session::flash('message','Data updated successfully');
        return redirect()->back();
        //print_r($tbl);
    }
    public function uploadimage($location,$imagename)
    {
     $name = $imagename ->getClientOriginalName();
     $imagename->move(public_path().'/'.$location,date('ymdgis').$name);
     return date('ymdgis').$name;
    }
}
