<?php include './includes/header.php'; ?>


<?php

include './db_connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users SET email = '$email', password = '$encrypted_password'";

    $conn->query($sql);

    echo 'login';
}

?>


<div class="container d-flex justify-content-center mt-5">
    <div class="card col-6">
        <div class="card-body">
            <h5 class="card-title">Sign Up</h5>
            <div class="card-body">
                <form action="./signup.php" method="POST">
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
            <p>Already have an account? <a href="./login.php">login</a></p>
        </div>
    </div>
</div>
<?php include './includes/footer.php'; ?>