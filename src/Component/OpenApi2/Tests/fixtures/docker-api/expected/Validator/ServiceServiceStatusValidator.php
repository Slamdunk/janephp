<?php

namespace Docker\Api\Validator;

class ServiceServiceStatusValidator implements \Docker\Api\Validator\ValidatorInterface
{
    public function validate($data) : void
    {
        $constraints = array(new \Symfony\Component\Validator\Constraints\Collection(array('fields' => array('RunningTasks' => new \Symfony\Component\Validator\Constraints\Optional(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer')))), 'DesiredTasks' => new \Symfony\Component\Validator\Constraints\Optional(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer')))), 'CompletedTasks' => new \Symfony\Component\Validator\Constraints\Optional(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'integer'))))), 'allowExtraFields' => true)));
        $validator = \Symfony\Component\Validator\Validation::createValidator();
        $violations = $validator->validate($data, $constraints);
        if ($violations->count() > 0) {
            throw new \Docker\Api\Validator\ValidationException($violations);
        }
    }
}