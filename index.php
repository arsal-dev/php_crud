<?php

include('./db_connect.php');

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}



$sql = "SELECT * FROM form_data";
$result = $conn->query($sql);

$errors = [];

if (isset($_POST['submit'])) {
    // print_r($_FILES);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $error = true;

    if ($_FILES['profile']['name']) {
        $fileName = $_FILES['profile']['name'];
        $fileFullPath = $_FILES['profile']['full_path'];
        $fileTempPath = $_FILES['profile']['tmp_name'];
        $extention = strtolower(pathinfo($fileFullPath)['extension']);
        $newFileName = uniqid() . '.' . $extention;
        $fileSize = $_FILES['profile']['size'];
        $destination = 'uploads/' . $newFileName;
        $extentions = ['png', 'jpg', 'jpeg', 'gif'];
        $upload = true;

        if ($fileSize > 5000000) {
            $errors['file-size'] = 'file can only be less then 5 MB';
            $upload = false;
        }
        if (!in_array($extention, $extentions)) {
            $errors['file-extention'] = 'files can only be png, jpg, jpeg, gif';
            $upload = false;
        }
    }
    if (empty($name)) {
        $errors['name'] = 'please enter your name';
        $error = false;
    }
    if (empty($email)) {
        $errors['email'] = 'please enter your email';
        $error = false;
    }
    if (empty($subject)) {
        $errors['subject'] = 'please enter your subject';
        $error = false;
    }
    if (empty($message)) {
        $errors['message'] = 'please enter your message';
        $error = false;
    } else {

        if ($error) {
            if ($upload) {

                if (!file_exists('uploads/')) {
                    mkdir('uploads/', true);
                }

                move_uploaded_file($fileTempPath, $destination);

                $sql = "INSERT INTO `form_data`(`name`, `email`, `subject`, `message`, `picture_name`) VALUES ('$name','$email','$subject','$message','$newFileName')";

                if ($conn->query($sql) == true) {
                    echo 'data saved successfully';
                }
            }
        }
    }
}

include './includes/header.php';
?>
<div class="container mt-5">
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Errors!</strong>
            <hr>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="from-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name ?? '' ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?? '' ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="<?php echo $subject ?? '' ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="message">Message</label>
            <textarea id="message" cols="30" rows="10" name="message" class="form-control"><?php echo $message ?? '' ?></textarea>
        </div>
        <div class="from-group">
            <label for="profile">Profile</label>
            <input type="file" id="profile" name="profile" class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-primary mt-2">
    </form>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Img</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><img width="50px" src="./uploads/<?php echo $row['picture_name'] ?>" alt="img"></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['subject'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td><a href="./update.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Update</a></td>
                    <td><button class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#deleteModal" pic="<?php echo $row['picture_name'] ?>" id="<?php echo $row['id'] ?>">DELETE</button></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are You Sure You Want To DELETE?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger" id="dlt_yes">YES</a>
            </div>
        </div>
    </div>
</div>

<script src="./delete.js"></script>

<?php include './includes/footer.php'; ?>