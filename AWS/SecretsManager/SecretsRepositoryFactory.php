<?php

namespace ToucanTech\AWS\SecretsManager;

use Aws\SecretsManager\SecretsManagerClient;

class SecretsRepositoryFactory
{

    const DEFAULT_AWS_REGION = 'eu-west-1';

    public static function getSecretsManagerRepository($region = self::DEFAULT_AWS_REGION)
    {
        return new SecretRepository(
            new SecretsManagerClient(
                [
                    'region' => $region
                ]
            )
        );
    }
}