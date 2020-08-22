<html>
<head>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="uploadfile"><br>
<button type="submit" name="submit">upload</button><br>
</form>
</body>
</html>
<?php
print_r($_FILES["uploadfile"]);
?>