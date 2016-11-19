<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Links extends Model
{
    use SoftDeletes;

    public $table = 'links';

    public $primaryKey = 'id';

    public $dateFormat = 'U';

    protected $guarded = ['id','ip','name','owner','status','created_at','updated_at'];

    protected $dates = ['delete_at'];
}
