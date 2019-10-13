<?PHP


namespace App\Models;
use PDO;
class Interaction extends \Core\Model
{
	public function __construct()
	{
		session_start();
		$this->connection = static::getDB();
	}


	
}
