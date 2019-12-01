<!DOCTYPE html>
<html lang="eng">
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<form action="all_images.php" method="post" enctype="multipart/form-data">
    Show all uploaded images:
    <input type="submit" value="Show all Image" name="submit">
</form>

</body>
</html>