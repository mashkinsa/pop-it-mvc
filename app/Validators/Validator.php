<?php

namespace Validators;

class Validator
{
    //Разрешенные валидаторы
    private array $validators = [];
    //Итоговые ошибки
    private array $errors = [];
    //Проверяемые поля
    private array $fields = [];
    //Массив правил
    private array $rules = [];
    //Кастомные сообщения
    private array $messages = [];

    public function __construct(array $fields, array $rules, array $messages = [])
    {
        $this->validators = app()->settings->app['validators'] ?? [];
        $this->fields = $fields;
        $this->rules = $rules;
        $this->messages = $messages;
        $this->validate();
    }

    //Перебираем список всех валидируемых полей и для каждого поля вызываем метод validateField()
    private function validate(): void
    {
        foreach ($this->rules as $fieldName => $fieldValidators) {
            $this->validateField($fieldName, $fieldValidators);
        }
    }

    //Валидация отдельного поля
    private function validateField(string $fieldName, array $fieldValidators): void
    {
        foreach ($fieldValidators as $validatorName) {
            $parts = explode(':', $validatorName);
            $pureName = $parts[0];
            $args = isset($parts[1]) ? explode(',', $parts[1]) : [];

            if (!isset($this->validators[$pureName])) {
                continue;
            }

            $validatorClass = $this->validators[$pureName];
            $validator = new $validatorClass(
                $fieldName,
                $this->fields[$fieldName] ?? null,
                $args, // Аргументы типа ["6"] попадут в $this->args
                $this->messages[$pureName] ?? null
            );

            if (!$validator->rule()) {
                $this->errors[$fieldName][] = $validator->validate();
            }
        }
    }

    //Возврат массива найденных ошибок
    public function errors(): array
    {
        return $this->errors;
    }

    //Признак успешной валидации
    public function fails(): bool
    {
        return (bool)count($this->errors);
    }
}
