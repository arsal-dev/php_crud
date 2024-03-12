<?php
include './db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM form_data WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $image = $_POST['image'];
    $id = $_POST['id'];
    $fileFullPath = $_FILES['profile']['full_path'];
    $fileTempPath = $_FILES['profile']['tmp_name'];
    $extention = strtolower(pathinfo($fileFullPath)['extension']);
    $newFileName = uniqid() . '.' . $extention;
    $destination = 'uploads/' . $newFileName;

    if ($_FILES['profile']['name']) {
        unlink("uploads/$image");
        move_uploaded_file($fileTempPath, $destination);
        $sql = "UPDATE `form_data` SET `name`='$name',`email`='$email',`subject`='$subject',`message`='$message',`picture_name`='$newFileName' WHERE id = $id";
    } else {
        $sql = "UPDATE `form_data` SET `name`='$name',`email`='$email',`subject`='$subject',`message`='$message',`picture_name`='$image' WHERE id = $id";
    }

    $conn->query($sql);

    header('Location: index.php');
}

include './includes/header.php';
?>

<div class="container mt-5">
    <h3>Update Data!</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="from-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name'] ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="<?php echo $row['subject'] ?>" class="form-control">
        </div>
        <div class="from-group">
            <label for="message">Message</label>
            <textarea id="message" cols="30" rows="10" name="message" class="form-control"><?php echo $row['message'] ?></textarea>
        </div>
        <div class="from-group">
            <label for="profile">Profile</label>
            <input type="file" id="profile" name="profile" class="form-control">
        </div>
        <img src="./uploads/<?php echo $row['picture_name']; ?>" width="500px">
        <input type="hidden" name="image" value="<?php echo $row['picture_name']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <br>
        <input type="submit" name="submit" class="btn btn-primary mt-2">
    </form>
</div>

<?php include './includes/footer.php'; ?>