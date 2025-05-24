<?php


if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $password = rand(00000000,99999999);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = empty($_POST['country_code']) ? $_POST['phone'] : $_POST['country_code'] . $_POST['phone'];
    if(empty($name) || empty($gender) || empty($email) || empty($phone)){
        echo "Please fill all the fields";
        exit;
    }
    $data = [
            'name' => $name,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
    ];
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=mydatabase', 'root', 'piko1234');
        $sql = "INSERT INTO mydatabase (name, sex, email, phone, password) VALUES (:name, :gender, :email, :phone, :password)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute($data)) {
            echo "Data inserted successfully";
            die();
        }
    }catch (PDOException $e){
        echo "Data not inserted";
    }
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
