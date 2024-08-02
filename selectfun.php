<?php

require_once('./conection.php');
$users = [];

if (isset($_POST['show'])) {
    try {
        global $con;
        $stmt = $con->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <input type="submit" value="Show" class="btn" name="show">
    </form>
    <?php if (isset($_POST['show']) && !empty($users)) :?>
        <table>
            <tr>
                <th>Frist Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Country</th>
                <th>Level</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Password</th>

            </tr>
            <tr>
                <?php foreach ($users as $user) : ?>
                    <td>" <?= $user['fname'] ?> "</td>
                    <td>" <?= $user['lname'] ?>"</td>
                    <td>"<?= $user['age'] ?> "</td>
                    <td>" <?= $user['country'] ?> "</td>
                    <td>"<?= $user['lavel'] ?>"</td>
                    <td>" <?= $user['phone'] ?> "</td>
                    <td>" <?= $user['password'] ?> "</td>
                    <td>" <?= $user['gender'] ?> "</td>
                <?php endforeach; ?>
            </tr>
        </table>;
    <?php elseif (isset($_POST['show'])) : ?>
        <p>No data found</p>
    <?php endif; ?>
</body>

</html>