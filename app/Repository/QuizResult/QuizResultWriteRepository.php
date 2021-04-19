<?php

namespace App\Repository\QuizResult;

use App\model\QuizDifficulty;

class QuizResultWriteRepository
{
    /**
     * @var string
     */
    private $modelName;
    /**
     * @var Question
     */
    private $model;
    /**
     * @var string
     */
    private $table;

    public function __construct()
    {
        $this->modelName = 'quiz_difficulty';
        $this->model = new QuizDifficulty();
        $this->table = $this->model->getTable();
    }

    /**
     * クイズ難易度用データ保存
     * @param $inputData
     * TODO 問題数を5なので$i = 5としているが$inputDataの数で行いたい。
     */
    public function postQuizResult($inputData)
    {
        $questionIdData = [];
        for ($i = 0; $i < 5; $i++) {
            $beforeQuizDifficulty = $this->model::where('question_id', $inputData[$i]['questionId'])->first();

            if ($inputData[$i]["answerCode"] == 1) {
                $afterQuizDifficulty = [
                    'question_id' => $beforeQuizDifficulty['question_id'],
                    'solved_number' => $beforeQuizDifficulty['solved_number'] + 1,
                    'number_of_correct' => $beforeQuizDifficulty['number_of_correct'] + 1,
                ];
            } else if ($inputData[$i]["answerCode"] == 2) {
                $afterQuizDifficulty = [
                    'question_id' => $beforeQuizDifficulty['question_id'],
                    'solved_number' => $beforeQuizDifficulty['solved_number'] + 0,
                    'number_of_correct' => $beforeQuizDifficulty['number_of_correct'] + 1,
                ];
            }

        $this->model::where('question_id', $afterQuizDifficulty['question_id'])
            ->update([
                'question_id' => $afterQuizDifficulty['question_id'],
                'solved_number' => $afterQuizDifficulty['solved_number'],
                'number_of_correct' => $afterQuizDifficulty['number_of_correct'],
            ]);
        }
    }
}
