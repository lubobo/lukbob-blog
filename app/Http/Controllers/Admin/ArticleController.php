<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Status;
use App\Tag;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mmanos\Search\Search;
use Storage;

class ArticleController extends Controller
{
//******************************************新增文章页面******************************************//
    public function addArticles(){
        $statuses=Status::all();
        $tags=Tag::all();
        return view('article.addArticles',['statuses'=>$statuses,'tags'=>$tags]);
    }

//******************************************文章存储*********************************************//
    public function storeArticle(Request $request){
        $file = $request->file('file');
        $newFilename = $request['pic'] . '.' . $file->getClientOriginalExtension();
        $savePath = 'article/' . 'pics/' . $request['pic'] . '/' . $newFilename;
        Storage::put(
            $savePath,
            file_get_contents($file->getRealPath())
        );

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        if (!empty($request['status'])&&empty($request['tag'])) {
            $status = new Status();
            $status->name = $request['status'];
            $status->save();

            $id=Status::where(['name'=>$request['status']])->value('id');
            $article = new Article();
            $article->title = $request['title'];
            $article->tag_id= $request['tag_id'];
            $article->content = $request['content'];
            $article->status_id = $id;
            $article->pic = $savePath;
            $article->save();
        }
        elseif (empty($request['status'])&&!empty($request['tag'])) {
            $tag = new Tag();
            $tag->name = $request['tag'];
            $tag->save();

            $id=Tag::where(['name'=>$request['tag']])->value('id');
            $article = new Article();
            $article->title = $request['title'];
            $article->tag_id= $id;
            $article->content = $request['content'];
            $article->status_id = $request['status_id'];
            $article->pic = $savePath;
            $article->save();
        }
        elseif (!empty($request['status'])&&!empty($request['tag'])) {
            $tag = new Tag();
            $tag->name = $request['tag'];
            $tag->save();

            $status = new Status();
            $status->name = $request['status'];
            $status->save();

            $tag_id=Tag::where(['name'=>$request['tag']])->value('id');
            $status_id=Status::where(['name'=>$request['status']])->value('id');
            $article = new Article();
            $article->title = $request['title'];
            $article->tag_id= $tag_id;
            $article->content = $request['content'];
            $article->status_id = $status_id;
            $article->pic = $savePath;
            $article->save();
        }
        else {
            $article = new Article();
            $article->title = $request['title'];
            $article->tag_id= $request['tag_id'];
            $article->content = $request['content'];
            $article->status_id = $request['status_id'];
            $article->pic = $savePath;
            $article->save();
        }

//        $art=Article::where(['title'=>$request['title']])->first();
//        $s=Search::insert($art->id,array(
//                'title'=>$art->title,
//                'content'=>$art->content,
//                'status_id'=>$art->Status->id,
//                'tag_id'=>$art->Tag->id,
//            )
//        );
//        dd($s);
        return redirect()->route('welcome');
    }

//******************************************编辑文章**********************************************//
    public function uploadArticle(Request $request){
        $article=Article::where(['id'=>$request['id']])->first();
        $statuses=Status::orderBy('id','asc')->get();
        $tags=Tag::orderBy('id','asc')->get();
        return view('article.uploadArticle',['article'=>$article,'statuses'=>$statuses,'tags'=>$tags]);
    }

    public function postUploadArticle(Request $request){
        Storage::delete($request['pic']);
        $file = $request->file('file');
        $a=explode('/',$request['pic']);
        $savePath = $a['0'] . '/' . $a['1'] . '/' . $a['2'] . '/'  . $a['2'] . '.' . $file->getClientOriginalExtension();
        Storage::put(
            $savePath,
            file_get_contents($file->getRealPath())
        );

        if (!empty($request['status'])&&empty($request['tag'])) {
            $status = new Status();
            $status->name = $request['status'];
            $status->save();

            $id=Status::where(['name'=>$request['status']])->value('id');

            Article::where(['id'=>$request['id']])->update([
                'title' => $request['title'],
                'tag_id' => $request['tag_id'],
                'content' => $request['content'],
                'status_id' => $id,
                'pic'=> $savePath
            ]);

        }
        elseif (empty($request['status'])&&!empty($request['tag'])) {
            $tag = new Tag();
            $tag->name = $request['tag'];
            $tag->save();

            $id=Tag::where(['name'=>$request['tag']])->value('id');

            Article::where(['id'=>$request['id']])->update([
                'title' => $request['title'],
                'tag_id' => $id,
                'content' => $request['content'],
                'status_id' => $request['status_id'],
                'pic'=> $savePath
            ]);

        }
        elseif (!empty($request['status'])&&!empty($request['tag'])) {
            $tag = new Tag();
            $tag->name = $request['tag'];
            $tag->save();

            $status = new Status();
            $status->name = $request['statusa'];
            $status->save();

            $tag_id=Tag::where(['name'=>$request['tag']])->value('id');
            $status_id=Status::where(['name'=>$request['status']])->value('id');

            Article::where(['id'=>$request['id']])->update([
                'title' => $request['title'],
                'tag_id' => $tag_id,
                'content' => $request['content'],
                'status_id' => $status_id,
                'pic'=> $savePath
            ]);

        }
        else {
            Article::where(['id'=>$request['id']])->update([
                'title' => $request['title'],
                'tag_id' => $request['tag_id'],
                'content' => $request['content'],
                'status_id' => $request['status_id'],
                'pic'=> $savePath
            ]);
        }

        return redirect()->route('adminArticle');
    }

//******************************************删除文章**********************************************//

    public function deleteArticle(Request $request){
        $article=Article::where(['id'=>$request['id']])->first();
        $article->delete();
        return redirect()->route('adminArticle');
    }

//******************************************Ajax处理脚本******************************************//
    public function checkStatus($name){
        $status=Status::where(['name'=>$name])->first();
        if(!empty($status)){
            return '该分类已经存在';
        }
        else{
            return ' ';
        }
    }

    public function checkTag($name){
        $status=Tag::where(['name'=>$name])->first();
        if(!empty($status)){
            return '该标签已经存在';
        }
        else{
            return ' ';
        }
    }

}
