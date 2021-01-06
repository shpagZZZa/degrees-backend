<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerCollection;
use App\Models\Answer;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    public function getDefaultAction(): Response
    {
        return \response(new AnswerCollection(Answer::where('id', '<', '6')->get()), 200);
    }
}
