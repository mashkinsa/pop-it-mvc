<?php
namespace Validators;

class ImageValidator extends AbstractValidator {
    protected string $message = 'Файл :field должен быть изображением (JPEG, PNG) до 2 МБ';

    public function rule(): bool {
        if (empty($this->value['tmp_name'])) {
            return true; // Файл не обязателен
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jfif'];
        $maxSize = 2 * 1024 * 1024;

        // Более надежная проверка MIME-типа
        $fileMime = mime_content_type($this->value['tmp_name']);

        return in_array($fileMime, $allowedTypes)
            && $this->value['size'] <= $maxSize
            && is_uploaded_file($this->value['tmp_name']); // Дополнительная проверка безопасности
    }
}
