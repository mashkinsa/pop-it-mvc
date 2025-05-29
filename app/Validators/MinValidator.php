<?php

namespace Validators;

class MinValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно содержать минимум 8 символов';

    public function rule(): bool
    {
        if (empty($this->args)) {
            return false;
        }

        $minLength = (int)$this->args[0];

        if (is_string($this->value)) {
            return mb_strlen(trim($this->value)) >= $minLength;
        }

        if (is_numeric($this->value)) {
            return $this->value >= $minLength;
        }

        return false;
    }
}