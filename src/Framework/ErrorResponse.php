<?php
declare(strict_types=1);

namespace App\Framework;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ErrorResponse extends JsonResponse
{
    public function __construct(string $errorMessage, int $status)
    {
        parent::__construct([
            'error' => [
                'message' => $errorMessage,
                'code' => $status,
            ],
        ], $status, [], false);
    }
}