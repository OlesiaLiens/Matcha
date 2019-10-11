<?php


namespace App\Models;

use PDO;

class Browse extends \Core\Model
{
    public function __construct()
    {
        session_start();
        $this->connection = static::getDB();
    }


    public function getUsersGallery($user)
    {

        $db = static::getDB();

        $user_id = $user['id'];
        $user_gender = $user['gender'];
        $user_preference = $user['preference'];


        $current_user_id_tags = $db->prepare("SELECT tag_id FROM users_tags WHERE user_id = ?");
        $current_user_id_tags->execute([$user_id]);
        $res = $current_user_id_tags->fetchAll(PDO::FETCH_ASSOC);
        if ($res) {
            $tags = [];

            foreach ($res as $id) {
                $tag = $db->prepare("SELECT tag FROM tags WHERE id = :id");
                $tag->execute(array(':id' => $id['tag_id']));
                $res_1 = $tag->fetchColumn(0);
                array_push($tags, $res_1);
            }
        }

        $all_users = $db->prepare("SELECT id AS userID, avatar, first_name AS firstName, last_name AS lastName, bio, bday AS age, rating, location, longitude, latitude FROM users WHERE gender = ? AND preference = ? ORDER BY rating");
        $all_users->execute([$user_preference, $user_gender]);
        $users = $all_users->fetchAll(PDO::FETCH_ASSOC);


        $tags_1 = [];

        foreach ($users as $user) {
            $users_id = $db->prepare("SELECT tag_id FROM users_tags WHERE user_id = :id");
            $users_id->execute(array(':id' => $user['userID']));
            $arr = $users_id->fetchColumn();
            if ($arr !== false)
                array_push($tags_1, $arr);
        }


        if ($tags_1) {
            $tags_2 = [];

            foreach ($tags_1 as $id) {
                $tag = $db->prepare("SELECT tag FROM tags WHERE id = :id");
                $tag->execute(array(':id' => $id));
                $res_1 = $tag->fetchColumn(0);
                array_push($tags_2, $res_1);
            }
//            $res = json_encode($tags_2);
        }


//        echo json_encode($users);


//        $sql = "SELECT
//                    *
//                FROM
//                    users
//                WHERE
//                    gender = :userPreference AND
//                    (preference = :userGender OR preference = 'all'
//                ORDER BY rating";


//		$output = file_get_contents('../Test/browseJSON.json');
//		echo $output;
    }

    public function getOwnData()
    {
        $output = array();
        $queryArg = array(':userid' => $_SESSION['user_id']);

        $sql = "SELECT
					longitude, latitude
				FROM
					users
				WHERE
					id = :userid";
        $longLatStatement = $this->connection->prepare($sql);
        $longLatStatement->execute($queryArg);
        $queryRes = $longLatStatement->fetch(PDO::FETCH_ASSOC);
        $output = array_merge($output, $queryRes);

        $tags = array();
        $sql = "SELECT
					tags.tag
				FROM
					tags
					INNER JOIN users_tags
					ON tags.id = users_tags.tag_id
				WHERE
					user_id = :userid";
        $tagsStatement = $this->connection->prepare($sql);
        $tagsStatement->execute($queryArg);
        $queryRes = $tagsStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($queryRes as $row) {
            array_push($tags, $row['tag']);
        }
        $output['tags'] = $tags;
        echo json_encode($output);
    }
}
