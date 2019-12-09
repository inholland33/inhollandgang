<!DOCTYPE html>
<html lang="eng">
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" onchange="loadfile(event)">
    <input type="submit" value="Upload Image" name="submit">
</form>

<img id="prevImg" widht="200px" height="200px">
<script type="text/javascript">
    function loadfile(event){
        var output=document.getElementById('prevImg');
        output.scr=URL.createObjectURL(event.target.files[0]);
    };
</script>
<form action="all_images.php" method="post" enctype="multipart/form-data">
    Show all uploaded images:
    <input type="submit" value="Show all Image" name="submit">
</form>

</body>
</html>