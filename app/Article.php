<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    public $table = 'articles';

    public $primaryKey = 'id';

    public $dateFormat = 'Y-m-d H:i:s';

    protected $guarded = ['id','title','tag_id','content','pic','user_id','status_id','created_at','updated_at'];

    protected $dates = ['delete_at'];

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function tag(){
        return $this->belongsTo('App\Tag');
    }
}
