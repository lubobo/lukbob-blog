<?php

namespace App\Http\Controllers\Home;

use App\Article;
use App\Links;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use Thujohn\Rss\Rss;
use App\Providers\SiteMap;

class UserController extends Controller
{

//******************************************欢迎界面*********************************************//
    public function welcome(){
        session(['user'=>'xiaoshen']);
        session(['role'=>'user']);
        $articles=Article::orderBy('created_at','desc')->paginate(4);
        $tags=Tag::orderBy('id','desc')->get();
        $links=Links::orderBy('id','desc')->get();
        $arts=Article::where('created_at','>',date("Y-m-d", strtotime("last Month")))->orderBy('id','desc')->get();
        return view('users.welcome',[
            'articles'=>$articles,
            'tags'=>$tags,
            'links'=>$links,
            'arts'=>$arts
        ]);
    }

//******************************************文章详情*********************************************//
    public function getArticle(Request $request){
        $article=Article::where(['id'=>$request['id']])->first();
        $tags=Tag::orderBy('id','desc')->get();
        $links=Links::orderBy('id','desc')->get();
        $arts=Article::where('created_at','>',date("Y-m-d", strtotime("last Month")))->orderBy('id','desc')->get();
        return view('users.getArticle',[
            'article'=>$article,
            'tags'=>$tags,
            'links'=>$links,
            'arts'=>$arts
        ]);
    }

//******************************************分类查看*********************************************//
    public function getStatusArticle(Request $request){
        $status_id=Status::where(['name'=>$request['status']])->value('id');
        $articles=Article::where(['status_id'=>$status_id])->orderBy('created_at','desc')->paginate(4);
        $arts=Article::where('created_at','>',date("Y-m-d", strtotime("last Month")))->get();
        $links=Links::orderBy('id','desc')->get();
        $tags=Tag::orderBy('id','desc')->get();
        return view('users.welcome',[
            'articles'=>$articles,
            'tags'=>$tags,
            'links'=>$links,
            'arts'=>$arts
        ]);
    }
    public function getTagArticle(Request $request){
        $tag_id=Tag::where(['name'=>$request['tag']])->value('id');
        $articles=Article::where(['tag_id'=>$tag_id])->orderBy('created_at','desc')->paginate(4);
        $arts=Article::where('created_at','>',date("Y-m-d", strtotime("last Month")))->get();
        $links=Links::orderBy('id','desc')->get();
        $tags=Tag::orderBy('id','desc')->get();
        return view('users.welcome',[
            'articles'=>$articles,
            'tags'=>$tags,
            'links'=>$links,
            'arts'=>$arts
        ]);
    }

//******************************************搜索文章*********************************************//
    public function searchFor(Request $request){
        $articles=Article::where(['title'=>$request['title']])->orderBy('created_at','desc')->paginate(4);
        $tags=Tag::orderBy('id','desc')->get();
        $links=Links::orderBy('id','desc')->get();
        $arts=Article::where('created_at','>',date("Y-m-d", strtotime("last Month")))->get();
        return view('users.welcome',[
            'articles'=>$articles,
            'tags'=>$tags,
            'links'=>$links,
            'arts'=>$arts
        ]);
    }
}


