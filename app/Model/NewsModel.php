<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'news';
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'news_title',
        'news',
        'news_status'
    ];
}
