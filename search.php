 <?php if (!isset($_SESSION['usertype'])){ die(); } ?>
<?php


function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
          
if (!isset($_POST['sent'])){
?>

<form method="post" action="">
<input type="hidden" name="sent" id="sent">
<table>
<tr>
<th>
ΑΡΧΙΚΑ
</th>
<td>
<input type="text" name="arxika" id="arxika">
</td>
</tr>
<tr>
<th>
ΚΩΔΙΚΟΣ
</th>
<td>
<input type="text" name="sc_ardeltiou" id="sc_ardeltiou">
</td>
</tr>
<tr>
<th>
ΕΠΩΝΥΜΟ
</th>
<td>
    <input type="text" name="last" id="last">

</td>
</tr>
<tr>
<th>
ΟΝΟΜΑ
</th>
<td>
<input type="text" name="first" id="first">
</td>
</tr>
<tr>
<th>
ΟΝΟΜΑ ΠΑΤΡΟΣ
</th>
<td>
<input type="text" name="father" id="father">
</td>
</tr>
<tr>
<th>
ΟΝΟΜΑ ΜΗΤΡΟΣ
</th>
<td>
<input type="text" name="mother" id="mother">
</td>
</tr>
<tr>
<th>

<input type="submit" value="ΑΝΑΖΗΤΗΣΗ">
</th>
</tr>
</table>

</form>

<?php
}
else {
	echo "<h2>ΑΠΟΤΕΛΕΣΜΑΤΑ ΑΝΑΖΗΤΗΣΗΣ</h2>";
        
        $arxika = test_input($_POST['arxika']);
	$last = test_input($_POST['last']);
	$first = test_input($_POST['first']);
	$fname = test_input($_POST['father']);
	$mname = test_input($_POST['mother']);
	$sc_ardeltiou = test_input($_POST['sc_ardeltiou']);
	$where_clause = " 1 ";
	if (strlen($arxika)==4){
		$where_clause .= " and arxika = '".$arxika."' ";
	}
	if (strlen($last)>0){
		$where_clause .= " and last like '%".$last."%' ";
	}
	if (strlen($first)>0){
		$where_clause .= " and first like '%".$first."%' ";
	}
	if (strlen($fname)>0){
		$where_clause .= " and fname like '%".$fname."%' ";
	}
	if (strlen($mname)>0){
		$where_clause .= " and mname like '%".$mname."%' ";
	}
	if (strlen($sc_ardeltiou)>0){
		$where_clause .= " and sc_ardeltiou = '".$sc_ardeltiou."' ";
	}
	$sql = "select sc_ardeltiou, last, first, fname, mname from userinfo where ".$where_clause." order by last, first, fname, mname";
        
	$result = mysql_query($sql);
        echo "<p>".mysql_num_rows($result)." Φοιτητές</p><hr>";
	while ($row=mysql_fetch_assoc($result)){
		echo "<a class='resultset' href='?action=details&code=".$row['sc_ardeltiou']."' target='blanc'>";
		echo $row['sc_ardeltiou'].". ".$row['last']." ".$row['first']." (".$row['fname']." - ".$row['mname'].")";
		echo "</a>";
	}
}
?>

