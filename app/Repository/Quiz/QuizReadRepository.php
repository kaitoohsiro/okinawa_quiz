<?php

namespace App\Repository\Quiz;

use App\model\Question;
use App\model\Category;


class QuizReadRepository
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
    /**
     * construct
     */
    public function __construct()
    {
        $this->modelName = 'questions';
        $this->model = new Question();
        $this->table = $this->model->getTable();
    }

    /**
     * 管理者用クイズ一覧取得
     */
    public function getQuizAdmin()
    {
        $questionData = $this->model::get();
        return $questionData;
    }

    public function getCategory()
    {
        $categoryList = Category::get();

        return $categoryList;
    }


    /**
     * ユーザ用クイズ取得
     * @return mixed
     */
    public function getQuiz($categoryId)
    {
        $quizData = $this->model;
        if ($categoryId) {
            $quizData = $quizData::where('category_id', '=', $categoryId);
        }
        $quizData = $quizData->inRandomOrder()
            ->take(5)
            ->get();

        return $quizData;
    }
}
