<?php

namespace App\Http\Controllers;

use App\Http\Resources\Feedback as FeedbackResource;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Quiz;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function storeAction(int $id, Request $request)
    {
        $data = $request->request->all()['feedback'];

        $feedback = new Feedback();
        $feedback
            ->setQuizId($id)
            ->setAnswerId($data['answer']['id'])
            ->setComment($data['comment'] ?? '')
            ->setEmployeeId($data['authorId'])
        ;

        $feedback->save();

        return \response(new FeedbackResource($feedback), 200);
    }

    public function checkAnsweredAction(int $id, Request $request): Response
    {
        $user = $this->authService->getUser($request->headers->get('access-code'));

        /** @var Quiz $quiz */
        $quiz = Quiz::find($id);
        $answered = false;

        /** @var Feedback $feedback */
        foreach ($quiz->feedbacks as $feedback) {
            /** @var Employee $author */
            $author = $feedback->author;
            if ($author->id === $user->id) {
                $answered = true;
                break;
            }
        }

        return \response(['success' => $answered], 200);
    }
}
