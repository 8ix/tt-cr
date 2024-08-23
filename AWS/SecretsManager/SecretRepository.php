<?php

namespace ToucanTech\AWS\SecretsManager;

use Aws\SecretsManager\Exception\SecretsManagerException;
use Aws\SecretsManager\SecretsManagerClient;

class SecretRepository {

    /**
     * Always pin the version of AWS APIs rather than using "latest" to avoid nasty shocks
     */
    public const SECRETSMANAGER_VERSION = '2017-10-17';

    private $secretsManagerClient;

    public function __construct(SecretsManagerClient $secretsManagerClient) {
        $this->secretsManagerClient = $secretsManagerClient;
    }

    public function getSecret(string $key) {
        return $this->fetchSecret($key);
    }

    private function fetchSecret(string $key) {
        try {
            return $this->secretsManagerClient->getSecretValue(['SecretId' => $key]);
        } catch (SecretsManagerException $e) {
            throw new \Exception(
                'Failed to fetch secret "' . $key . '": ' . $e->getMessage()
            );
        }
    }
}