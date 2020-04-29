<?php

namespace JGI\Fraktjakt\Exception;

class ApiException extends \Exception
{
    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string|null
     */
    private $warningMessage;

    /**
     * @param int $code
     * @param string $errorMessage
     * @param string|null $warningMessage
     */
    public function __construct(int $code, string $message, ?string $warningMessage)
    {
        $this->code = $code;
        $this->message = $message;
        $this->warningMessage = $warningMessage;
    }
}

