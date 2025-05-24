<?php

function generatePassword(): int
{
    return rand(00000000,99999999);
}

function connection(string $host,string $dbName, string $userName, string $password): PDO
{
    return new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
}

function insert(PDO $connection, array $data): bool
{
    $columns = implode(',', array_keys($data));
    $values = ":" . implode(', :', array_keys($data));
    $sql = "INSERT INTO mydatabase ($columns) VALUES ($values)";
    $stmt = $connection->prepare($sql);
    return $stmt->execute($data);
}

function getData()
{
    $name = trim($_POST['name']);
    $password = generatePassword();
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = empty($_POST['country_code']) ? $_POST['phone'] : $_POST['country_code'] . $_POST['phone'];
    if(empty($name) || empty($gender) || empty($email) || empty($phone)){
        echo "Please fill all the fields";
        exit;
    }
    return[
            'name' => $name,
            'sex' => $gender,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
    ];
}

function store(): void
{
    try {
        $db = connection('127.0.0.1', 'mydatabase', 'root', 'piko1234');
        $data = getData();
        $result = insert($db, $data);
        if($result){
            echo "Data inserted";
        }
    }catch (PDOException $e){
        echo $e->getMessage();
        echo "Data not inserted";
    }
}

if(isset($_POST['submit'])){
    store();
}

?>
<html lang="en">
<form method="post">
    <label>Name: <input type="text" name="name" required> </label> <br>
    <label>Password: <input type="text" name="password" disabled> </label> <br>

    <label><input type="radio" name="gender" value="1" required> Male</label>
    <label><input type="radio" name="gender" value="0"> Female</label> <br>

    <label>Email: <input type="email" name="email" required> </label> <br>
    <label for="phone">Phone no :
        <select name="country_code" id="country_code" required>
            <option value="977">977</option>
        </select>
    </label>
    <input type="text" name="phone" id="phone" placeholder="Enter phone number" required> <br>
    <input type="submit" name="submit" value="Submit">
</form>
</html>
