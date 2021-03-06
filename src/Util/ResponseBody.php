<?php

namespace App\Util;

use JMS\Serializer\SerializerInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ResponseBody
{
    /** @var SerializerInterface */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    const WRONG_PASSWORD = "Incorrect Password.";
    const USER_NOT_FOUND = "User '%s' doesn't exist.";

    private function template(int $code, $data, $errors)
    {
        return [
            'status' => $code,
            'data' => $data,
            'errorsCount' => count($errors),
            'errors' => $errors,
        ];
    }

    public function create(int $code, $data, $errors)
    {
        return View::create($this->template($code, $data, $errors), $code, []);
    }

    static function getValidatorErrors(ConstraintViolationListInterface $violationList)
    {
        $errors = [];

        foreach ($violationList as $violation) {
            $errors[] = ['property' => $violation->getPropertyPath(), 'message' => $violation->getMessage()];
        }

        return $errors;
    }
}