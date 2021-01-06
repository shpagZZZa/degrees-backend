<?php


namespace App\Service;


use App\Models\Answer;

class AnswerService
{
    /**
     * @param array $answerNames
     * @return Answer[]
     */
    public function getAnswers(array $answerNames): array
    {
        $result = [];
        foreach ($answerNames as $name) {
            $result[] = (new Answer())->setTitle($name['title']);
        }
        return $result;
    }
}
