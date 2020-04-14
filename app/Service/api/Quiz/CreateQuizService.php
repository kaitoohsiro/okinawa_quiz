<?php

namespace App\Service\api\Quiz;

use App\Repository\Quiz\QuizWriteRepository;
use App\Repository\Quiz\QuizReadRepository;
use Illuminate\Support\Facades\DB;

class CreateQuizService
{
    private $quizWriteRepository;
    private $quizReadRepository;

    public function __construct(QuizWriteRepository $quizWriteRepository, QuizReadRepository $quizReadRepository)
    {
        $this->quizWriteRepository = $quizWriteRepository;
        $this->quizReadRepository = $quizReadRepository;
    }

    public function getExecute()
    {
        return $this->quizReadRepository->getCategory();
    }

    public function execute($inputData)
    {
        DB::transaction(function () use ($inputData) {
            $this->quizWriteRepository->createQuiz($inputData);
        });
    }
}
