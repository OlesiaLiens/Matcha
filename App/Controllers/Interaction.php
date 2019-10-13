<?PHP

namespace App\Controllers;

use App\Models\Interaction as InteractionModel;
use App\Models\User;
use Core\View;

class Interaction extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user)
			return;
		View::render('Interaction/index.php');
	}

	public function getInteractionsAction() {
		$interactions = new InteractionModel();
		$interactions->getInteractions();
	}

}

?>