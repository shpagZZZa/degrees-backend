<?php

namespace App\Http\Controllers;

use App\Http\Resources\Quiz as QuizResource;
use App\Models\Quiz;
use App\Service\AnswerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizController extends Controller
{
    private AnswerService $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    public function storeAction(Request $request): Response
    {
        $data = $request->request->all();

        $quiz = new Quiz();
        $quiz
            ->setTitle($data['title'])
            ->setSubTitle($data['subtitle'] ?? '')
            ->setEmployeeId($data['employeeId'])
        ;

        $quiz->save();

        if ($data['defaultAnswers']) {
            $quiz->answers()->sync([1, 2, 3, 4, 5]);
        } else {
            $answers = $this->answerService->getAnswers($data['answers']);
            foreach ($answers as $answer) {
                $answer->save();
                $quiz->answers()->attach($answer->id);
            }
        }

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
