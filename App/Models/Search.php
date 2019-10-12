<?php


namespace App\Models;

use PDO;

class Search extends \Core\Model
{
    public function __construct()
    {
        session_start();
        $this->connection = static::getDB();
    }

    public static function getUserByPage($page_number)
    {
        $db = static::getDB();
        $start_index = $page_number * 5 - 5;

        $all_photos = "SELECT * FROM users LIMIT $start_index, 5";
        $res = $db->query($all_photos);
        $row = $res->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        }
        return [];
    }

    public static function getUsersCount()
    {
        $db = static::getDB();

        $all_photos = "SELECT count(*) FROM users";
        $res = $db->query($all_photos);
        $row = $res->fetchColumn();
        if ($row) {
            return $row;
        }
        return 0;
    }

    public function getResults($requestJSON)
    {
        $request = json_decode($requestJSON);


        $min_age = $request->minAge;
        $max_age = $request->maxAge;
        $min_rate = $request->minRate;
        $max_rate = $request->maxRate;
        $tags = $request->tags;

        $db = static::getDB();

        $get_users = $db->prepare("SELECT id AS userID, avatar, first_name AS firstName, last_name AS lastName, bio, bday AS age, rating, location, longitude, latitude FROM users WHERE bday > $min_age AND bday < $max_age AND rating > $min_rate AND rating < $max_rate ");
        $get_users->execute([]);
        $users = $get_users->fetchAll(PDO::FETCH_ASSOC);

        $tags_id = [];
        $output = array();
        if ($tags) {
            foreach ($users as $user) {
                $users_id = $db->prepare("SELECT tag_id FROM users_tags WHERE user_id = :id");
                $users_id->execute(array(':id' => $user['userID']));
                $arr = $users_id->fetchAll(PDO::FETCH_ASSOC);
                if ($arr !== false)
                    array_push($tags_id, $arr);

                $tags_2 = [];
                if ($tags_id) {

                    foreach ($tags_id as $key) {
                        foreach ($key as $value) {
                            $tag = $db->prepare("SELECT tag FROM tags WHERE id = :id");
                            $tag->execute(array(':id' => $value['tag_id']));
                            $res_1 = $tag->fetchColumn();
                            if ($res_1) {
                                array_push($tags_2, $res_1);
                            }
                        }
                    }

                }
                $true = array_intersect($tags, $tags_2);
                if ($true) {
                    $user['tags'] = $tags_2;
                    $tags_2 = array();
                    $tags_id = array();
                    array_push($output, $user);

                }

            }
        } else {
            foreach ($users as $user) {
                $user['tags'] = $tags;
                array_push($output, $user);
            }
        }
        $res = json_encode($output);
        echo $res;
    }
}
