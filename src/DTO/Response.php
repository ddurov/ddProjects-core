<?php

namespace Core\DTO;

class Response
{
    private int $code = 200;
    private string $status;

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return Response
     */
    public function setCode(int $code): Response
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Response
     */
    public function setStatus(string $status): Response
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * @return void
     */
    public function send(): void
    {
        http_response_code($this->code);
        die(self::toJson());
    }
}