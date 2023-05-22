<?php
declare(strict_types=1);

final class VisitorConfig
{
    public function __construct(private readonly string $ip, private readonly string $userAgent, private readonly string $pageUrl)
    {
    }

    public static function createFromEnv(): VisitorConfig
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? null;
        if (null === $ip) {
            throw new \Exception('Ip is empty');
        }

        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        if (null === $userAgent) {
            throw new \Exception('User agent is empty');
        }

        $pageUrl = $_SERVER['HTTP_REFERER'] ?? null;
        if (null === $pageUrl) {
            throw new \Exception('Visitor page url is empty');
        }

        return new VisitorConfig($ip, $userAgent, $pageUrl);
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }
}