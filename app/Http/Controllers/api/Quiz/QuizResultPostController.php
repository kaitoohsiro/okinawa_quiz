<?php

namespace App\Http\Controllers\api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\api\QuizResult\PostResultQuizService;

class QuizResultPostController extends Controller
{

    private $postResultQuizService;

    public function __construct(PostResultQuizService $postResultQuizService)
    {
        $this->postResultQuizService = $postResultQuizService;
    }

    public function handle(Request $request)
    {
        $inputData = $request;
        $this->postResultQuizService->execute($inputData);
    }
}
