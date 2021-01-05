<?php

namespace App\Http\Controllers;

use App\Http\Resources\Quiz as QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizController extends Controller
{
    public function storeAction(Request $request): Response
    {
        $data = $request->request;

        $quiz = new Quiz();
        $quiz
            ->setTitle($data['title'])
            ->setSubTitle($data['subtitle'])
            ->setUserId($data['userId'])
        ;
        $quiz->save();

        $quiz->answers()->sync($data['answers']);

        return response(new QuizResource($quiz), Response::HTTP_OK);
    }

    public function getAction(int $id): Response
    {
        $quiz = Quiz::find($id);
        return $quiz ? response(new QuizResource($quiz), Response::HTTP_OK) :
            $this->getErrorResponse(404)
        ;
    }
}
