<?php  

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
			$this->cmd = 'cd ' . $this->appBasePath . ' && git reset --hard HEAD && git checkout ' . $this->branchToUpdate . ' && git pull origin ' . $this->branchToUpdate;
		}

		public function deploy() {
			echo 'executing cmd...' . PHP_EOL;
			echo  $this->cmd . PHP_EOL;
			echo shell_exec($this->cmd) . PHP_EOL;
		}
	}
	
?>