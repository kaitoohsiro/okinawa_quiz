<?php

namespace App\Repository\Quiz;

use App\model\Question;
use App\model\Category;
use App\model\QuizDifficulty;

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
        $quizDifficulty = new QuizDifficulty();
        $quizData = $this->model;
        $quizData = $quizData->inRandomOrder()
            ->take(5)
            ->get();
        $difficultyData = [];
        foreach ($quizData as $quiz) {
            array_push($difficultyData, $quiz['id']);
        }
        $difficultyElement = $quizDifficulty::whereIn('question_id', $difficultyData)
            ->select('question_id', 'solved_number', 'number_of_correct')
            ->get();

        foreach ($quizData as $quiz) {
            foreach ($difficultyElement as $element) {
                if ($quiz['id'] === $element['question_id']) {
                    if ($element['number_of_correct'] === 0) {
                        $difficulty = 0;
                    } else {
                        $difficulty = round(($element['solved_number'] / $element['number_of_correct']) * 100, 1);
                    }
                    $quiz['difficulty'] = $difficulty;
                }
            }
        }
        return $quizData;
    }
}
