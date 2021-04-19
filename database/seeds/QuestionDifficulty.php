<?php

use Illuminate\Database\Seeder;
use App\model\QuizDifficulty;
use App\model\Question;

class QuestionDifficulty extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question();
        $quizDifficulty = new QuizDifficulty();
        $allQuestionId = $question::select('id as question_id')->get();

        $insertData = [];
        foreach ($allQuestionId as $questionId) {
            array_push($insertData,[
                'question_id' => $questionId['question_id'],
                'solved_number' => 0,
                'number_of_correct' => 0,
            ]);
        }
        $quizDifficulty::insert($insertData);
    }
}
