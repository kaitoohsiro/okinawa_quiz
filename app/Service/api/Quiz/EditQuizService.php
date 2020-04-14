<?php

namespace App\Service\api\Quiz;

use App\Repository\Quiz\QuizWriteRepository;
use Illuminate\Support\Facades\DB;

class EditQuizService
{
    private $quizWriteRepository;

    public function __construct(QuizWriteRepository $quizWriteRepository)
    {
        $this->quizWriteRepository = $quizWriteRepository;
    }

    public function execute($editData)
    {
        DB::transaction(function () use ($editData) {
            $this->quizWriteRepository->editQuiz($editData);
        });
    }
}
