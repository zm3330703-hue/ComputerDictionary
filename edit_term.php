<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<form method="post" align="center">
<label>ادخل اسم المصطلح لتعديله:</label><br>
<input type="text" name="search">
<input type="submit" name="find" value="بحث">
</form>

<?php
if(isset($_POST['find'])){
    $search = $_POST['search'];
    $result = mysqli_query($conn, "SELECT * FROM terms WHERE term='$search'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="post" enctype="multipart/form-data" align="center">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>الاسم:</label><br>
        <input type="text" name="term" value="<?php echo $row['term']; ?>"><br><br>
        <label>المعنى:</label><br>
        <textarea name="meaning"><?php echo $row['meaning']; ?></textarea><br><br>
        <label>صورة جديدة (اختياري):</label><br>
        <input type="file" name="image"><br><br>
        <input type="submit" name="update" value="تعديل">
        </form>
        <?php
    } else {
        echo "<p align='center'>لا يوجد مصطلح بهذا الاسم</p>";
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $term = $_POST['term'];
    $meaning = $_POST['meaning'];
    $image = $_FILES['image']['name'];
    if($image != ""){
        $target = "images/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE terms SET term='$term', meaning='$meaning', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE terms SET term='$term', meaning='$meaning' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    echo "<p align='center'>تم التعديل بنجاح</p>";
}
?>
</body>
</html>