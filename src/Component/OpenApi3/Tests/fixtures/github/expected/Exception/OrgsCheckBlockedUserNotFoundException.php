<?php

namespace Github\Exception;

class OrgsCheckBlockedUserNotFoundException extends NotFoundException
{
    /**
     * @var \Github\Model\BasicError
     */
    private $basicError;
    public function __construct(\Github\Model\BasicError $basicError)
    {
        parent::__construct('If the user is not blocked:', 404);
        $this->basicError = $basicError;
    }
    public function getBasicError() : \Github\Model\BasicError
    {
        return $this->basicError;
    }
}