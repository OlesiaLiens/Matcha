<?PHP

$DB_DSN = 'mysql:host=localhost:3306';
$DB_NAME = 'matcha';
$DB_SHORTCUT = $DB_DSN . ';dbname=' . $DB_NAME;
$DB_USER = 'root';
$DB_PASS = 'root';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING,
    PDO::ATTR_STRINGIFY_FETCHES => true
];

?>
