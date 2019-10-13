<?PHP

namespace App\Models;

use PDO;
use function PHPSTORM_META\map;

class Notification extends \Core\Model
{
    public function __construct()
    {
        session_start();
        $this->connection = static::getDB();
    }

    public function getCounters()
    {
        $sql = "SELECT
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND see = 'see') AS 'see',
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND liked = 'liked') AS 'like',
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND matched = 'matched') AS 'match',
					(SELECT COUNT(*) FROM messages WHERE receiver = :id) AS 'msgs'";
        $countersStatement = $this->connection->prepare($sql);
        $countersStatement->execute(array(':id' => $_SESSION['user_id']));
        $counters = $countersStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($counters);
    }

    public function getSee()
    {
        $sql = "SELECT
                    first_name, last_name
                FROM
                    user_action
                    INNER JOIN users
                    ON user_action.second_user = users.id
                WHERE
                    first_user = :id AND
                    see = 'see'
                ORDER BY
                    users.id DESC
                LIMIT 1";
        $countersStatement = $this->connection->prepare($sql);
        $countersStatement->execute(array(':id' => $_SESSION['user_id']));
        $see = $countersStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($see);
    }

    public function getLike()
    {
        $sql = "SELECT
                    first_name, last_name
                FROM
                    user_action
                    INNER JOIN users
                    ON user_action.second_user = users.id
                WHERE
                    first_user = :id AND
                    liked = 'liked'
                ORDER BY
                    users.id DESC
                LIMIT 1";
        $countersStatement = $this->connection->prepare($sql);
        $countersStatement->execute(array(':id' => $_SESSION['user_id']));
        $like = $countersStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($like);
    }


    public function getMatch()
    {
        $sql = "SELECT
                    first_name, last_name
                FROM
                    user_action
                    INNER JOIN users
                    ON user_action.second_user = users.id
                WHERE
                    first_user = :id AND
                    matched = 'matched'
                ORDER BY
                    users.id DESC
                LIMIT 1";
        $countersStatement = $this->connection->prepare($sql);
        $countersStatement->execute(array(':id' => $_SESSION['user_id']));
        $matched = $countersStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($matched);
    }
}

?>


