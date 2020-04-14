<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * questionテーブル
     *
     * @var string
     */
    protected $table = 'question';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'correct',
        'choice1',
        'choice2',
        'explain_sentence',
        'image_name',
        'category_id'
    ];


}
