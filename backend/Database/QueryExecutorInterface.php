<?php
declare(strict_types=1);

interface QueryExecutorInterface
{
    public function execute(string $query, array $params = []): PDOStatement|bool;
}