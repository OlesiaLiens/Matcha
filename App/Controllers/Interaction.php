<?PHP

namespace App\Controllers;

use App\Models\Interaction as InteractionModel;
use App\Models\User;
use Core\View;

class Interaction extends \Core\LoginController
{
	public function indexAction()
	{
		// $this->viewGallery(1);
		View::render('Interaction/index.php');

	}

}

?>