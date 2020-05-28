<?php

namespace App\Repository\Quiz;

use App\model\Question;

class QuizWriteRepository
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
        $this->modelName = 'questions';
        $this->model = new Question();
        $this->table = $this->model->getTable();
    }

    /**
     * クイズを作成
     * @param $inputData
     */
    public function createQuiz($inputData)
    {
        $this->model::insert([
            'question' => $inputData['quiz'],
            'correct' => $inputData['answer'],
            'choice1' => $inputData['choice1'],
            'choice2' => $inputData['choice2'],
            'explain_sentence' => $inputData['explainSentence'],
            'image_name' => $inputData['imageName'],
            'category_id' => $inputData['categoryId']
        ]);
    }


    /**
     * クイズ編集
     * @param $editData
     */
    public function editQuiz ($editData) {
        $this->model::where('id', '=', $editData['id'])
            ->update([
            'question' => $editData['question'],
            'correct' => $editData['correct'],
            'choice1' => $editData['choice1'],
            'choice2' => $editData['choice2'],
            'explain_sentence' => $editData['explain_sentence'],
            'image_name' => $editData['image_name'],
            'category_id' => $editData['category_id']
        ]);
    }

    public function deleteQuiz ($quizId)
    {
        $this->model::where('id', '=', $quizId)
            ->delete();
    }
}
