<form method="post">
<input type="hidden" name="logged" />
<input type="submit" />
</form>

<?php
if(isset($_POST['logeed']))
echo('<br /><br />'.$_POST['f']);

?>