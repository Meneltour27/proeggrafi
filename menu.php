<?php
if (!isset($_SESSION['usertype'])){
?>
<a  class="menu" href="?action=smodify">ΤΡΟΠΟΠΟΙΗΣΗ</a>
<?php
}
?>
<?php
if ((isset($_SESSION['usertype']))&&($_SESSION['usertype']=="A")){
?>
<a  class="menu" href="?action=modify">ΤΡΟΠΟΠΟΙΗΣΗ</a>
<a  class="menu" href="?action=register">ΕΓΓΡΑΦΗ</a>
<a  class="menu" href="?action=search">ΑΝΑΖΗΤΗΣΗ</a>
<a  class="menu" href="?action=import">ΕΙΣΑΓΩΓΗ</a>
<?php
}
?>
<?php
if (!isset($_SESSION['usertype'])){
?>
<a  class="menu" href="?action=login">ΕΙΣΟΔΟΣ</a>
<?php
}
else {
?>

<a  class="menu" href="?action=logout">ΕΞΟΔΟΣ</a>
<?php
}
?>
