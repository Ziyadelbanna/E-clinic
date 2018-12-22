<html>
<?php


include 'form page.php';

$redirect_page = 'https://www.youtube.com/watch?v=QYTmOVeVj24';

if(isset($_POST['submit'])){

header('Location: '.$redirect_page);

}

?>
</html>