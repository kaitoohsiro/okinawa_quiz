<?php

namespace App\Service\api\QuizResult;

use App\Repository\QuizResult\QuizResultWriteRepository;
// use App\Repository\QuizResult\QuizResultReadRepository;
use Illuminate\Support\Facades\DB;

class PostResultQuizService
{
    private $quizResultWriteRepository;
    // private $quizResultReadRepository;

    public function __construct(QuizResultWriteRepository $quizResultWriteRepository)
    {
        $this->quizResultWriteRepository = $quizResultWriteRepository;
        // $this->quizResultReadRepository = $quizResultReadRepository;
    }

    public function execute($inputData)
    {
        DB::transaction(function () use ($inputData) {
            $this->quizResultWriteRepository->postQuizResult($inputData);
        });
    }
}
