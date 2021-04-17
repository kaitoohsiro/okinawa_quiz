<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuizDifficulty extends Model
{
        /**
     * questionテーブル
     *
     * @var string
     */
    protected $table = 'quiz_difficulty';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
        'solved_number',
        'number_of_correct',
    ];
}
