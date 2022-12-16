<?php

namespace App\Http\Controllers;

use Request;
use Session;
use DB;

class admincontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view ('backend.index');
    }

    public function viewcategory()
    {
        $data = DB::table('categories')->get();
        return view ('backend.categories.category',['data'=>$data]);
    }
    public function editcategory($id)
    {
        $singledata =DB::table('categories')->where('cid',$id)->first();
        if($singledata == NULL)
        {
            return redirect('viewcategory');
        }
        $data = DB::table('categories')->get();
        return view ('backend.categories.editcategory',['data'=>$data,'singledata'=>$singledata]);
    }
    public function multipledelete(){
        $data = Request::except('_token');
        if($data['bulk-action']==0)
        {
            session::flash('message','Please select the action you want to perform');
            return redirect() ->back();
        }
        $tbl =decrypt($data['tbl']);
        $tblid =decrypt($data['tblid']);
        if(empty($data['select-data']))
        {
            session::flash('message','Please select the data you want to delete');
            return redirect() ->back();
        }
        $ids= $data['select-data'];
        foreach($ids as $id)
        {
            DB::table($tbl)->where($tblid,$id)->delete();
        }
        session::flash('message','Data deleted successfully');
        return redirect()->back();
    }
    public function settings(){
        $data=DB::table('settings')->first();
        if($data){
            $data->social = explode(',',$data->social);
        }
        return view ('backend.settingsview',['data'=>$data]);
    }
    public function addpost(){
        $categories = DB::table('categories')->get();
        return view('backend.posts.add-post',['categories'=>$categories]);
    }
    public function allposts(){
        $posts=DB::table('posts')->orderBy('pid','Desc')->paginate(20);
        foreach($posts as $post)
        {
            $categories = explode(',',$post->category_id);
            foreach($categories as $cat){
                $postcat=DB::table('categories')->where('cid',$cat)->value('title');
                $postcategories[]=$postcat;
                $postcat =implode(', ',$postcategories);
            }
            $post->category_id=$postcat;
            $postcategories=[];
        }
        $published=DB::table('posts')->where('status','publish')->count();
        $allposts=DB::table('posts')->count();
        return view ('backend.posts.all-posts',['posts'=>$posts,'published'=>$published,'allposts'=>$allposts]);
    }
    public function editpost($id){
        $data=DB::table('posts')->where('pid',$id)->first();
        $postcat=explode(',',$data->category_id);
        $categories = DB::table('categories')->get();
        return view('backend.posts.edit',['data'=>$data,'categories'=>$categories,'postcat'=>$postcat]);
    }

    public function addPage(){
        return view('backend.pages.add-page');
    }
    public function allpages(){
        $pages=DB::table('pages')->get();
        $published=DB::table('pages')->where('status','publish')->count();
        $allpages=DB::table('pages')->count();
        return view ('backend.pages.all-pages',['pages'=>$pages,'published'=>$published,'allpages'=>$allpages]);
    }
    public function editpage($id){
        $data=DB::table('pages')->where('pageid',$id)->first();
        return view('backend.pages.edit',['data'=>$data]);
    }

}
