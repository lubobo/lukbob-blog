<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Links;
use App\Status;
use App\Tag;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Providers\SiteMap;

class AdminController extends Controller
{
//******************************************管理员登录******************************************//
    public function getAdmin(){
        return view('admin.getAdmin');
    }

//******************************************管理员首页******************************************//
    public function adminHome(Request $request){
        $this->validate($request,[
            'admin_name'=>'required',
            'password'=>'required'
        ]);
        if($request['admin_name']=='admin'&&$request['password']=='admin')
        {
            session(['user'=>'root']);
            session(['role'=>'admin']);
            return view('admin.adminHome');
        }
        else
            return redirect()->back();
    }

//******************************************文章管理页面******************************************//
    public  function adminArticle(){
        $articles=Article::orderBy('created_at','desc')->paginate(15);
        return view('admin.adminArticle',[
            'articles'=>$articles
        ]);
    }

//******************************************友链管理页面******************************************//
    public function getLinks(){
        $links=Links::orderBy('id','asc')->paginate(15);
        return view('admin.getlinks',[
            'links'=>$links
        ]);
    }
//*******************************************站点地图*********************************************//
    public function siteMap(SiteMap $siteMap){
        $map = $siteMap->getSiteMap();
        return response($map)->header('Content-type','text/xml');
    }
}
