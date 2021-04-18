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
            array_push($questionIdData, $inputData[$i]['questionId']);
        }

        // TODO question_idが一致するデータ全て取得

        // TODO question_idからデータを書き換える

        // TODO データ更新または新規作成

        // $this->model::insert([
        //     'question' => $inputData['quiz'],
        //     'correct' => $inputData['answer'],
        //     'choice1' => $inputData['choice1'],
        //     'choice2' => $inputData['choice2'],
        //     'explain_sentence' => $inputData['explainSentence'],
        //     'image_name' => $imageUrl,
        //     'category_id' => $inputData['categoryId']
        // ]);
    }
}
