<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\model\QuizDifficulty;

class QuestionDifficulty extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allQuizDifficulty = [
            $quiz1 = [
                'question_id' => '1',
                'solved_number' => 20,
                'number_of_correct'=> 10,
            ],
            $quiz2 = [
                'question_id' => '2',
                'solved_number' => 30,
                'number_of_correct'=> 13,
            ],
            $quiz3 = [
                'question_id' => '3',
                'solved_number' => 100,
                'number_of_correct'=> 20,
            ],
        ];
        foreach ($allQuizDifficulty as $QuizDifficulty) {
            DB::table('quiz_difficulty')->insert($QuizDifficulty);
        }
    }
}
