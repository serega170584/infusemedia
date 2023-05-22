<?php
declare(strict_types=1);

final class Config
{
    public function __construct(private readonly string $databaseType, private readonly string $databaseHost, private readonly string $databaseName, private readonly string $databaseUser, private readonly string $databasePassword)
    {
    }

    public static function createFromEnv(): Config
    {
        $databaseType = $_ENV['DATABASE_TYPE'] ?? null;
        if (null === $databaseType) {
            throw new \Exception('Database type is empty');
        }

        $databaseHost = $_ENV['DATABASE_HOST'] ?? null;
        if (null === $databaseHost) {
            throw new \Exception('Database host is empty');
        }

        $databaseName = $_ENV['DATABASE_NAME'] ?? null;
        if (null === $databaseName) {
            throw new \Exception('Database name is empty');
        }

        $databaseUser = $_ENV['DATABASE_USER'] ?? null;
        if (null === $databaseUser) {
            throw new \Exception('Database user is empty');
        }

        $databasePassword = $_ENV['DATABASE_PASSWORD'] ?? null;
        if (null === $databasePassword) {
            throw new \Exception('Database password is empty');
        }

        return new Config($databaseType, $databaseHost, $databaseName, $databaseUser, $databasePassword);
    }

    /**
     * @return string
     */
    public function getDatabaseType(): string
    {
        return $this->databaseType;
    }

    /**
     * @return string
     */
    public function getDatabaseHost(): string
    {
        return $this->databaseHost;
    }

    /**
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * @return string
     */
    public function getDatabaseUser(): string
    {
        return $this->databaseUser;
    }

    /**
     * @return string
     */
    public function getDatabasePassword(): string
    {
        return $this->databasePassword;
    }
}