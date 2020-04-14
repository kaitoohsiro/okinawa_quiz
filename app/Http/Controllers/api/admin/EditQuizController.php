<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Service\api\Quiz\EditQuizService;
use Illuminate\Http\Request;

class EditQuizController extends Controller
{
    private $editQuizService;

    public function __construct(EditQuizService $editQuizService)
    {
        $this->editQuizService = $editQuizService;
    }

    public function handle (Request $request)
    {
        $editData = $request;

        $this->editQuizService->execute($editData);
    }
}
