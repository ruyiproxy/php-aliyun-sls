<?php

namespace Aliyun\SLS;

/**
 * Copyright (C) Alibaba Cloud Computing
 * All rights reserved.
 *
 * The Exception of the log service request & response.
 *
 * @author log service dev
 */
class Exception extends \Exception
{
    /**
     * @var string
     */
    private $requestId;

    /**
     * Exception constructor.
     *
     * @param string $code      log service error code
     * @param string $message   detailed information for the exception
     * @param string $requestId the request id of the response, '' is set if client error
     */
    public function __construct($message, $code = 0, $requestId = '')
    {
        parent::__construct($message, $code);
        $this->code      = $code;
        $this->message   = $message;
        $this->requestId = $requestId;
    }

    /**
     * The __toString() method allows a class to decide how it will react when
     * it is treated like a string.
     *
     * @return string
     */
    public function __toString()
    {
        return "Exception: \n{\n    ErrorCode: {$this->code},\n    ErrorMessage: {$this->message}\n    RequestId: {$this->requestId}\n}\n";
    }

    /**
     * Get Exception error code.
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->code;
    }

    /**
     * Get Exception error message.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->message;
    }

    /**
     * Get log service sever requestid, '' is set if client or Http error.
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }
}
