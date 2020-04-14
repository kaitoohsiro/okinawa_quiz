<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\GetQuizService;

class AdminQuizController extends Controller
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
        $quizData = $this->getQuizService->adminExecute();
        return response()->json($quizData);
    }
}
