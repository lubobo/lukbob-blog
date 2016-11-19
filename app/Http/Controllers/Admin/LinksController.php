<?php

namespace App\Http\Controllers\Admin;

use App\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public function addLinks(){
        return view('link.addLinks');
    }

    public function postLinks(Request $request){
        $link=new Links();
        $link->ip=$request['ip'];
        $link->name=$request['name'];
        $link->owner=$request['owner'];
        $link->status=$request['status'];
        $link->save();
        return redirect()->route('getLinks');
    }

    public function check_ip($ip){
        if (strlen($ip)<'4'){
            return '友链ip格式不正确';
        }
        else {
            $link = Links::where('ip', $ip)->first();
            if (isset($link)) {
                return '友链ip已存在';
            } else
                return ' ';
        }
    }
    public function check_name($name){
        if (strlen($name)<'4'){
            return '友链name格式不正确';
        }
        else{
            $link=Links::where('name',$name)->first();
            if (isset($link)){
                return '友链name已存在';
            }
            else
                return ' ';
        }
    }

    public function uploadLink(Request $request){
        $link=Links::where(['id'=>$request['id']])->first();
        return view('link.uploadLink',[
            'link'=>$link
        ]);
    }

    public function postUploadLink(Request $request){
        Links::where(['id'=>$request['id']])->update([
            'ip'=>$request['ip'],
            'name'=>$request['name'],
            'owner'=>$request['owner'],
            'status'=>$request['status']
        ]);
        return redirect()->route('getLinks');
    }

    public function deleteLink(Request $request){
        $link=Links::where(['id'=>$request['id']])->first();
        $link->delete();
        return redirect()->route('getLinks');
    }
}
