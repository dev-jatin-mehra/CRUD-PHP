<?php
    function insertUser($conn, $name, $age, $email, $phone, $address) {
        $query = "INSERT INTO users (name, age, email, phone, address) VALUES ('$name', $age, '$email', '$phone', '$address')";
        return $conn->query($query);
    }

    function updateUser($conn, $email, $name, $age, $phone, $address) {
        $query = "UPDATE users SET name='$name', age=$age, phone='$phone', address='$address' WHERE email='$email'";
        return $conn->query($query);
    }

    function deleteUser($conn, $email) {
        $query = "DELETE FROM users WHERE email='$email'";
        return $conn->query($query);
    }

    function getUserByEmail($conn, $email) {
        $query = "SELECT * FROM users WHERE email='$email'";
        return $conn->query($query);
    }
?>
