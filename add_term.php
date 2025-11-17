<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<form method="post" enctype="multipart/form-data" align="center">
<label>اسم المصطلح:</label><br>
<input type="text" name="term" required><br><br>

<label>المعنى:</label><br>
<textarea name="meaning" required></textarea><br><br>

<label>صورة المصطلح:</label><br>
<input type="file" name="image"><br><br>

<input type="submit" name="submit" value="إضافة">
</form>

<?php
if(isset($_POST['submit'])){
    $term = $_POST['term'];
    $meaning = $_POST['meaning'];
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);
    $sql = "INSERT INTO terms (term, meaning, image) VALUES ('$term','$meaning','$image')";
    mysqli_query($conn, $sql);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    echo "<p align='center'>تمت الإضافة بنجاح</p>";
}
?>
</body>
</html>