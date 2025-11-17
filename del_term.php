<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<form method="post" align="center">
<label>ادخل اسم المصطلح لحذفه:</label><br>
<input type="text" name="term">
<input type="submit" name="delete" value="حذف">
</form>

<?php
if(isset($_POST['delete'])){
    $term = $_POST['term'];
    $check = mysqli_query($conn, "SELECT * FROM terms WHERE term='$term'");
    if(mysqli_num_rows($check)>0){
        mysqli_query($conn, "DELETE FROM terms WHERE term='$term'");
        echo "<p align='center'>تم الحذف بنجاح</p>";
    } else {
        echo "<p align='center'>لا يوجد مصطلح بهذا الاسم</p>";
    }
}
?>
</body>
</html>