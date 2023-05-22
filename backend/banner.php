<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/Database/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Database/QueryExecutorInterface.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Database/QueryExecutor.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Visitor/VisitorConfig.php';

$config = Config::createFromEnv();
$visitorConfig = VisitorConfig::createFromEnv();

$client = new PDO(sprintf('%s:host=%s;dbname=%s', $config->getDatabaseType(), $config->getDatabaseHost(), $config->getDatabaseName()), $config->getDatabaseUser(), $config->getDatabasePassword());

try {
    $client->beginTransaction();

    $query = '
SELECT *
FROM visit
WHERE ip = :ip AND user_agent = :user_agent AND page_url = :page_url
FOR UPDATE
';

    $preparedStatement = (new QueryExecutor($client))->execute($query, [
        'ip' => ip2long($visitorConfig->getIp()),
        'user_agent' => $visitorConfig->getUserAgent(),
        'page_url' => $visitorConfig->getPageUrl()
    ]);

    $query = '
INSERT INTO visit(ip, user_agent, page_url, view_date, views_count)
VALUE(:ip, :user_agent, :page_url, NOW(), 1)
ON DUPLICATE KEY UPDATE view_date = NOW(), views_count = views_count + 1;
';
    $preparedStatement = (new QueryExecutor($client))->execute($query, [
        'ip' => ip2long($visitorConfig->getIp()),
        'user_agent' => $visitorConfig->getUserAgent(),
        'page_url' => $visitorConfig->getPageUrl()
    ]);

    $client->commit();
} catch (\Exception $e) {
    $client->rollBack();
}
