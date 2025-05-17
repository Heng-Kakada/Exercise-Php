<?php
$host = "127.0.0.1";
$user = "root";
$pass = "piko1234";
$db = "mydatabase";

function connect($host,$user,$pass,$dbName): PDO
{
    return new PDO("mysql:host=$host;dbname=$dbName", $user,$pass);
}
function insert(PDO $conn, string $tableName, array $data): bool
{
    $columns = implode(',', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
    $query = $conn->prepare($sql);
    return $query->execute($data);
}
function update(PDO $conn, string $tableName, array $data, string $criteria): bool
{
    $columnValue = array();
    foreach ($data as $key => $value) {
        $columnValue[] = "$key = :$key";
    }
    $columnValue = implode(',', $columnValue);
    $sql = "update $tableName set $columnValue where $criteria";
    echo $sql;
    $query = $conn->prepare($sql);
    return $query->execute($data);
}

function delete(PDO $conn, string $tableName, string $criteria): bool
{
    $sql = "delete from $tableName where $criteria";
    $query = $conn->prepare($sql);
    return $query->execute();
}


try {
    $db = connect($host, $user, $pass, $db);
    $data = [
        'name' => 'Piko 1',
        'age' => 20,
    ];

    insert($db, 'student', $data);
    //update($db, 'student', $data, "id = 9");
    //delete($db, 'student', "id = 9");
}catch (PDOException $e){
    echo $e->getMessage();
}

