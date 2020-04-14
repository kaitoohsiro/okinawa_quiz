<?php

namespace App\Http\Controllers\api\Quiz;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\GetQuizService;

class QuizGetController extends Controller
{

    /**
     * @var $getQuizService
     */
    private $getQuizService;

    public function __construct(GetQuizService $getQuizService)
    {
        $this->getQuizService = $getQuizService;
    }

    public function handle()
    {
        $quizData = $this->getQuizService->execute();
        return response()->json($quizData);
    }
}
