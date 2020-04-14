<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\DeleteQuizService;
use Illuminate\Http\Request;

class DeleteQuizController extends Controller
{
    private $deleteQuizService;

    public function __construct(DeleteQuizService $deleteQuizService)
    {
        $this->deleteQuizService = $deleteQuizService;
    }

    public function handle (Request $request)
    {
        $questionId = $request->input('id');
        $this->deleteQuizService->execute($questionId);
    }
}
