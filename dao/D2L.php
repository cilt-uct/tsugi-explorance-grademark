<?php
namespace Explorance\D2L;


class D2L {

    private $tool;
    private $site_id;

    public function __construct($tool, $site_id) {

        $this->tool = $tool;
        $this->site_id = $site_id;
    }

    private function buildUrl($path) {
        $baseUrl = rtrim($this->tool['middleware_url'], '/');
        $normalizedPath = '/'.ltrim($path, '/');
        return $baseUrl.$normalizedPath;
    }

    private function fetchUrl($url, $maxRetries = 3, $initialBackoffMs = 250, $timeoutSeconds = 20) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return [
                'success' => 0,
                'msg' => 'invalid url',
                'status' => 0,
                'body' => null,
            ];
        }

        $attempt = 0;
        $lastError = 'request failed';
        $username = isset($this->tool['middleware_username']) ? $this->tool['middleware_username'] : '';
        $password = isset($this->tool['middleware_password']) ? $this->tool['middleware_password'] : '';

        while ($attempt <= $maxRetries) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CONNECTTIMEOUT => $timeoutSeconds,
                CURLOPT_TIMEOUT => $timeoutSeconds,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_USERPWD => $username.':'.$password,
                CURLOPT_HTTPHEADER => ['Accept: application/json, text/plain, */*'],
            ]);

            $body = curl_exec($ch);
            $curlErrNo = curl_errno($ch);
            $curlError = curl_error($ch);
            $httpStatus = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $shouldRetry = false;

            if ($curlErrNo !== 0) {
                $lastError = $curlError ?: 'network error';
                $shouldRetry = true;
            } else if ($httpStatus >= 200 && $httpStatus < 300) {
                $decodedBody = json_decode($body, true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decodedBody)) {
                    return [
                        'success' => 0,
                        'msg' => 'invalid json response',
                        'status' => $httpStatus,
                        'body' => null,
                    ];
                }

                return [
                    'success' => isset($decodedBody['status']) && $decodedBody['status'] === "success" ? 1 : 0,
                    'msg' => 'ok',
                    'status' => $httpStatus,
                    'body' => $decodedBody['data'],
                ];
            } else {
                $lastError = 'http status '.$httpStatus;
                if ($httpStatus == 429 || ($httpStatus >= 500 && $httpStatus < 600)) {
                    $shouldRetry = true;
                }
            }

            if (!$shouldRetry || $attempt === $maxRetries) {
                break;
            }

            $delayMs = $initialBackoffMs * (1 << $attempt);
            usleep($delayMs * 1000);
            $attempt++;
        }

        return [
            'success' => 0,
            'msg' => $lastError,
            'status' => isset($httpStatus) ? $httpStatus : 0,
            'body' => null,
        ];
    }

    # Fetches the default setup for grades
    # GET /d2l/api/le/(version)/(orgUnitId)/grades/
    // public function getGrades() {
    //     return $this->fetchUrl($this->buildUrl('/grade/org/'.$this->site_id.'/items'));
    // }

}