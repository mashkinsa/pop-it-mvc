<?php

namespace Validators;

class RequireValidator extends AbstractValidator
{
    protected string $message = 'Поле :field обязательно для заполнения';

    public function rule(): bool
    {
        return !empty($this->value);
    }
}