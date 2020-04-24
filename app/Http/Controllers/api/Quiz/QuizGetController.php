<?php

namespace App\Http\Controllers\api\Quiz;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\GetQuizService;
use Illuminate\Http\Request;

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

    public function handle(Request $request)
    {
        $categoryId = $request->id;
        $quizData = $this->getQuizService->execute($categoryId);
        return response()->json($quizData);
    }
}
