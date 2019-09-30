<?PHP

namespace App\Models;
use PDO;

class Chat extends \Core\Model
{
	public function __construct()
	{
	}

	public function getDialogues() {
		$output = file_get_contents('../Test/samplediags.json');
		echo $output;
	}

	public function getAvatar() {
		echo '/men/man42.jpg';
	}
}
?>
