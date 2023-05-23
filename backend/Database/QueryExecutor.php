<?php
declare(strict_types=1);

final class QueryExecutor implements QueryExecutorInterface
{
    public function __construct(private readonly PDO $client)
    {
    }

    public function execute(string $query, array $params = []): PDOStatement|bool
    {
        $preparedStatement = $this->client->prepare($query);
        $preparedStatement->execute($params);
        return $preparedStatement;
    }
}