<?php include './includes/header.php'; ?>

<?php

include './db_connect.php';


$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = false;

    if (empty($email)) {
        $errors['email'] = 'Please Enter Email';
        $error = true;
    }
    if (empty($password)) {
        $errors['name'] = 'Please Enter Password';
        $error = true;
    }

    if ($error == false) {

        $sql = "SELECT password FROM users WHERE email = '$email'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $pass = $result->fetch_assoc();
            $db_password = $pass['password'];

            if (password_verify($password, $db_password)) {
                echo 'login';
            } else {
                $errors['auth'] = 'email or passwrod is wrong';
            }
        } else {
            $errors['auth'] = 'email or passwrod is wrong';
        }
    }
}

?>

<?php if (!empty($errors)) : ?>
    <div class="container mt-5 col-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>
<div class="container d-flex justify-content-center mt-5">
    <div class="card col-6">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <div class="card-body">
                <form action="./login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?? "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary mt-3">
                </form>
            </div>
            <p>Don't have an account? <a href="./signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

<?php include './includes/footer.php'; ?>