<?php

namespace ToucanTech\AWS;

use ToucanTech\AWS\SecretsManager\SecretsRepositoryFactory;

class GoCardlessConfig
{
    public static function getGoCardlessConfig() {
        $secretsRepository = SecretsRepositoryFactory::getSecretsManagerRepository();
        $gcconfig = $secretsRepository->getSecret('dev/gocardless')->toArray()['SecretString'];
        return json_decode($gcconfig, true);
    }
}