<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\CreateQuizService;
use Illuminate\Http\Request;

class CreateQuizController extends Controller
{
    private $createQuizService;

    public function __construct(CreateQuizService $createQuizService)
    {
        $this->createQuizService = $createQuizService;
    }

    public function getHandle()
    {
        $categoryList = $this->createQuizService->getExecute();
        return response()->json($categoryList);
    }

    public function handle(Request $request)
    {
        $inputData = $request;

        $this->createQuizService->execute($inputData);
    }
}
