<?php include("header.php"); ?>
<?php include("connection.php"); ?>

<form method="post" align="center">
<label>ادخل الكلمة:</label>
<input type="text" name="search">
<input type="submit" name="submit" value="بحث">
</form>

<?php
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $result = mysqli_query($conn, "SELECT * FROM terms 
WHERE term LIKE '%$search%' 
OR meaning LIKE '%$search%'");
    echo "<h3 align='center'>نتائج البحث:</h3>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<div align='center'>";
        echo "<b>".$row['term']."</b><br>".$row['meaning']."<br>";
        echo "<img src='images/".$row['image']."' width='200'><hr></div>";
    }
}
?>
</body>
</html>