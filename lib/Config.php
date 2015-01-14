<?php

    namespace PhpDeploy;

    class Config extends GeneralConfig
    {
        private $config;

        function __construct()
        {
            $this->config = parent::getConfigArray();
        }

        public function getWebmasterEmail()
        {
            return $this->config['mailer']['webmaster_email_address'];
        }

        public function getHeaderMessage() {
            return $this->config['mailer']['alert_email_header'];
        }
    }