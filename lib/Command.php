<?php

	namespace PhpDeploy;

	class Command {

		private $branchToUpdate;
		private $appBasePath;
		private $cmd;

		function __construct($_appBasePath, $_branchToUpdate) {
			$this->appBasePath = $_appBasePath;
			$this->branchToUpdate = $_branchToUpdate;

			$this->buildCmd();
		}

		private function buildCmd() {
			$this->cmd = '
			#!/bin/sh
			cd ' . $this->appBasePath . '
			git reset --hard HEAD
			git checkout ' . $this->branchToUpdate . '
			git fetch --all
			git pull --all';
		}

		public function deploy() {
			$shell_exec_result = 'executing cmd...' . PHP_EOL;
			$shell_exec_result .= $this->cmd . PHP_EOL;
			$shell_exec_result .= shell_exec($this->cmd) . PHP_EOL;
			echo $shell_exec_result;

			//Alert by mail
			$alert = new AlertMailer();
			$alert->alertCmd($shell_exec_result);
		}
	}
