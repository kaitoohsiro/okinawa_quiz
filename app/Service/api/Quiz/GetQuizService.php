<?php

namespace App\Service\api\Quiz;

use App\Repository\Quiz\QuizReadRepository;

class GetQuizService
{

    /**
     * @var QuizReadRepository
     */
    private $quizReadRepository;

    /**
     * GetQuizService constructor.
     * @param QuizReadRepository $quizReadRepository
     */
    public function __construct(QuizReadRepository $quizReadRepository)
    {
        $this->quizReadRepository = $quizReadRepository;
    }

    /**
     * 管理者用クイズ取得
     * @return mixed
     */
    public function adminExecute ()
    {
        return $this->quizReadRepository->getQuizAdmin();
    }

    /**
     * ユーザ用クイズ取得
     * @return mixed
     */
    public function execute ($categoryId)
    {
        return $this->quizReadRepository->getQuiz($categoryId);
    }

}
