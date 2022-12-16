<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class frontcontroller extends Controller
{   public function __construct(){
    $categories =DB::table('categories')->where('status','on')->get();
    $lastnews=DB::table('posts')->where('status','publish')->orderby('pid','DESC')->first();
    $pages=DB::table('pages')->where('status','publish')->get();
    view()->share([
        'categories' => $categories ,
        'lastnews' => $lastnews ,
        'pages' =>$pages,
    ]);
}
    public function index(){
        $featured=DB::table('posts')->where('category_id','LIKE','%9%')->get()->sortByDesc('pid')->all();
        $general=DB::table('posts')->where('category_id','LIKE','%10%')->get()->sortByDesc('pid')->all();
        $business=DB::table('posts')->where('category_id','LIKE','%2%')->get()->sortByDesc('pid')->all();
        $sports=DB::table('posts')->where('category_id','LIKE','%5%')->get()->sortByDesc('pid')->all();
        $technology=DB::table('posts')->where('category_id','LIKE','%4%')->get()->sortByDesc('pid')->all();
        $health=DB::table('posts')->where('category_id','LIKE','%8%')->get()->sortByDesc('pid')->all();
        $travel=DB::table('posts')->where('category_id','LIKE','%6%')->get()->sortByDesc('pid')->all();
        $entertainment=DB::table('posts')->where('category_id','LIKE','%3%')->get()->sortByDesc('pid')->all();
        $politics=DB::table('posts')->where('category_id','LIKE','%1%')->get()->sortByDesc('pid')->all();
        $style=DB::table('posts')->where('category_id','LIKE','%7%')->get()->sortByDesc('pid')->all();
        return view ('frontend.index',['featured'=>$featured,'general'=>$general,
        'business'=>$business,'sports'=>$sports,'technology'=>$technology,'health'=>$health,
        'travel'=>$travel,'entertainment'=>$entertainment,'politics'=>$politics,'style'=>$style]);
    }
    public function category($slug){
        $cat = DB::table('categories')->where('slug',$slug)->first();
        $posts=DB::table('posts')->where('category_id','LIKE','%'.$cat->cid.'%')->get();
        $latest=DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get(); 
        return view ('frontend.category',['posts'=>$posts,'cat'=>$cat,'latest'=>$latest]);
    }
    public function article($slug){
        $data = DB::table('posts')->where('slug',$slug)->first();
        $views=$data->views;
        DB::table('posts')->where('slug',$slug)->update(['views' => $views + 1]);
        $category=explode(',',$data->category_id);
        $category=$category[0];
        $related=DB::table('posts')->where('category_id','LIKE','%'.$category.'%')->get();
        $latest=DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view ('frontend.article',['data'=>$data,'related'=>$related,'latest'=>$latest]);
    }
    public function searchContent(){
        $url='http://127.0.0.1:8000/article';
        $text=$_GET['text'];
        $data=DB::table('posts')->where('title','LIKE','%'.$text.'%')->orwhere('description','LIKE','%'.$text.'%')->get();
        $output='';
        if(count($data) > 0){
        echo '<ul class="search-result">';
        foreach($data as $d){
            echo '<li><a href="'.$url.'/'.$d->slug.'">'.$d->title.'</a></li>';
        }
    }
        else{
            echo '<li><a> Sorry! No data found. </a></li>';
        }
        echo '</ul>';
        return $output;
    }
    public function page($slug){
        $data=DB::table('pages')->where('slug',$slug)->first();
        $latest=DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view ('frontend.page',['data'=>$data,'latest'=>$latest]);
    }

    public function contactUs(){
        $latest=DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view('frontend.contact',['latest'=>$latest]);
    }
}
