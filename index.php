<?php
$fname = null;
$lname = null;
$age = null;

$email = null;
$password = null;
$phone = null;
require_once('./functions/login_fun.php');
// if (isset($fname) && isset($lname) && isset($password) && isset($phone) && isset($gender) && isset($lavel) && isset($country) && isset($age)) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = addslashes(trim($_POST['fname']));
    $lname = addslashes(trim($_POST['lname']));
    $age = addslashes(trim($_POST['age']));
    $country = addslashes(trim($_POST['country']));
    $lavel = addslashes(trim($_POST['level']));
    $phone = addslashes(trim($_POST['phone']));
    $password = addslashes(trim($_POST['password']));
    $gender = addslashes(trim($_POST['gender']));
    signup($fname, $lname, $age, $country, $lavel, $phone, $password, $gender);
    // setcookie("user_info[fname]", $fname, strtotime("+1 year"));
    // setcookie("user_info[lname]", $lname, strtotime("+1 year"));
    // setcookie("user_info[age]", $age, strtotime("+1 year"));
    // setcookie("user_info[country]", $country, strtotime("+1 year"));
    // setcookie("user_info[lavel]", $lavel, strtotime("+1 year"));
    // setcookie("user_info[phone]", $phone, strtotime("+1 year"));
    // setcookie("user_info[password]", $password, strtotime("+1 year"));
    // setcookie("user_info[gender]", $gender, strtotime("+1 year"));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <h1>contact form</h1>
        <ul>
            <li><a href="./home.html">home</a></li>
            <li><a href="#">Admin</a></li>
            <li> <a href="#">about</a></li>
        </ul>
    </nav>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class=" lab1 lab_input">
            <label>Frist Name</label>
            <input type="text" placeholder="Enter your frist name " required="required" id="fname" name="fname">
        </div>
        <div class=" lab_input">
            <label>Last Name</label>
            <input type="text" placeholder="Enter your last name " required="required" id="lname" name="lname">
        </div>
        <div class=" lab_input">
            <label>Age</label>
            <input type="number" placeholder="Enter your age " required="required" id="age" name="age">
        </div>
        <div class="lab_input">
            <label>Country</label>
            <select required="required" id="Country" name="country">
                <option>Egypt</option>
                <option>France</option>
                <option>America</option>
            </select>
        </div>
        <div class="lab_input">
            <label for="level">Level</label>
            <select required="required" id="level" name="level">
                <option>Level-1</option>
                <option>Level-2</option>
                <option>Level-3</option>
                <option>Level-4</option>
            </select>
        </div>

        <div class=" lab_input">
            <label>Phone</label>
            <input type="number" placeholder="Enter your phone " required="required" id="phone" name="phone">
        </div>

        <div class=" lab_input">
            <label>Password</label>
            <input type="password" placeholder="Enter your password " required="required" id="password" name="password">
        </div>
        <div class="gender">
            <input type="radio" name="gender" value="female" id="woman">
            <label for="woman">Female</label><br>
            <input type="radio" name="gender" value="male" id="man">
            <label for="man">Male</label><br>

        </div>
        <input type="submit" value="send" class="btn" name="send">

    </form>
    <div class="user-info">
        <?php
        try {
            global $con;
            $stmt = $con->prepare("SELECT * FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        if ($stmt->rowCount()==0)
        {
            echo "no users";
        }
        ?>
        <table>

            <tr>
                <th>Frist Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Country</th>
                <th>Level</th>
                <th>Phone</th>
                <th>Gender</th>
                <!-- <th>Password</th> -->

            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td> <?= $user['fname'] ?></td>
                    <td> <?= $user['lname'] ?></td>
                    <td><?= $user['age'] ?> </td>
                    <td> <?= $user['country'] ?></td>
                    <td><?= $user['lavel'] ?></td>
                    <td> <?= $user['phone'] ?></td>
                    <td> <?= $user['gender'] ?> </td>
                    <!-- <td> <?= $user['password'] ?> </td> -->
                  
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
<!-- // <td> $fname</td>
            // <td>$lname</td>
            // <td>$age</td>
            //  <td> $country</td>
            // <td>$lavel</td>
            // <td>$phone</td>
            //  <td> $gender</td>
            // <td>$password</td>
             <td>" . $_COOKIE['user_info']['fname'] . "</td>
            <td>" . $_COOKIE['user_info']['lname'] . "</td>
            <td>" . $_COOKIE['user_info']['age'] . "</td>
            <td>" . $_COOKIE['user_info']['country'] . "</td>
            <td>" . $_COOKIE['user_info']['lavel'] . "</td>
            <td>" . $_COOKIE['user_info']['phone'] . "</td>
            <td>" . $_COOKIE['user_info']['password'] . "</td>
            <td>" . $_COOKIE['user_info']['gender'] . "</td>
            
            -->

</html>