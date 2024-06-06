<?php
namespace App\Services;
use Illuminate\Http\Response;
use Psr\Log\LoggerInterface;
use App\Constants;

class UtilService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logErrorAndMakeResponse(string $routeName, string $message): array
    {
        $this->logger->error("['" . $routeName . "']: " . $message);
        return $this->makeResponse(
            message: app()->environment('local') ? $message : Constants::GENERAL_ERROR_MESSAGE,
            statusCode: Response::HTTP_INTERNAL_SERVER_ERROR,
            type: Constants::FAIL_STATUS,
        );
    }

    public function makeResponse(
        $data = null,
        string $message = null,
        int $statusCode = Response::HTTP_OK,
        string $type = Constants::SUCCESS
    ): array {
        if (is_string($data)) {
            $message = $data;
            $data = null;
        }

        $response['data'] = $data;
        $response['code'] = $statusCode;
        $response['message'] = $message;
        $response['status'] = $type;
        return $response;
    }
}
