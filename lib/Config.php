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

        public function getSmtpUsername() {
            return $this->config['mailer']['smtp_username'];
        }

        public function getSmtpPort() {
            return $this->config['mailer']['smtp_port'];
        }

        public function getSmtpPassword() {
            return $this->config['mailer']['smtp_password'];
        }

        public function getSmtpHost() {
            return $this->config['mailer']['smtp_host'];
        }

        public function getSmtpFromEmail() {
            return $this->config['mailer']['smtp_from_email'];
        }

        public function getSmtpSecure() {
            return $this->config['mailer']['smtp_secure'];
        }

        public function getAfterPullCommand() {
            return $this->config['hooks']['after_pull_command'];
        }
    }