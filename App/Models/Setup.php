<?php

namespace App\Models;

use App\Models\Setup as SetupModel;

class Setup extends \Core\Model
{

	public function reinstall() {
		ob_start();
		include (__DIR__ . '/../../admin/setup.php');
		include (__DIR__ . '/../../admin/addSampleContent.php');
		ob_clean();
	}

}
