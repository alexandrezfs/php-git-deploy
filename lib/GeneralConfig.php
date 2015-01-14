<?php
/**
 * Created by PhpStorm.
 * User: alexandrenguyen
 * Date: 14/01/15
 * Time: 09:25
 */

namespace PhpDeploy;

use Symfony\Component\Yaml\Yaml;

class GeneralConfig implements ConfigInterface {

    public function getConfigArray()
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/../config/config.yml'));
    }

}