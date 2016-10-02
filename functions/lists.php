<?php

function natiolalitiesOption($x=""){
	$sql = "select `id`,`name` from `nationalityid` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
                
		
                if ($x!==""){
                    if ($row['id']==$x) { $selected = " selected "; } else { $selected = ""; }
                }
                else {
                    if ($row['name']=="ΕΛΛΗΝΙΚΗ") { $selected = " selected "; } else { $selected = ""; }
                }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}



function idOptions($x = "-1"){
    
    if ($x=="Α"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Α'>ΑΣΤΥΝΟΜΙΚΗ ΤΑΥΤΟΤΗΤΑ</option>";
    if ($x=="Δ"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Δ'>ΔΙΑΒΑΤΗΡΙΟ</option>";
    if ($x=="Ο"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Ο'>ΕΙΔΙΚΟ ΔΕΛΤΙΟ ΟΜΟΓΕΝΟΥΣ</option>";
    if ($x=="Σ"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Σ'>ΣΤΡΑΤΙΩΤΙΚΗ ΤΑΥΤΟΤΗΤΑ</option>";
}

function militaryOptions($x = "-1"){
    if ($x=="1"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='1'>ΕΚΠΛΗΡΩΜΕΝΕΣ</option>";
    if ($x=="2"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='2'>ΜΗ ΕΚΠΛΗΡΩΜΕΝΕΣ</option>";
}

function sexOptions($x = "-1"){
    if ($x=="Α"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Α'>ΑΝΔΡΑΣ</option>";
    if ($x=="Θ"){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='Γ'>ΓΥΝΑΙΚΑ</option>";
}

function maritalStatus($x=-1){
    if ($x==1){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='1'>ΑΓΑΜΟΣ</option>";
    if ($x==2){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='2'>ΕΓΓΑΜΟΣ</option>";
    if ($x==1){ $selected = " selected "; } else { $selected = ""; }
    echo "<option $selected value='3'>ΧΩΡΙΣΜΕΝΟΣ</option>";
}

function regionsOption($x=""){
	$sql = "select `id`,`name` from `nomoi` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($row['id']==$x) { $selected = " selected "; } else { $selected = ""; }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}

function departmentOption($x=""){
	$sql = "select `id`,`name` from `department_ID` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($row['id']==$x) { $selected = " selected "; } else { $selected = ""; }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}

function positionTypesOption($x=""){
	$sql = "select `id`,`name` from `in_modeid` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($x==$row['id']){
                    $selected = " selected ";
                }
                else {
                     $selected = "  ";
                }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}

function schooltypeOption($x=""){
        if ($x=="ΗΜ."){
            echo "<option selected  value='HM.'>ΗΜΕΡΗΣΙΟ</option>";
        }
        else {
            echo "<option   value='HM.'>ΗΜΕΡΗΣΙΟ</option>";
        }
        if ($x=="NY."){
            echo "<option selected  value='ΝΥ.'>ΝΥΧΤΕΡΙΝΟ</option>";
        }
        else {
            echo "<option   value='ΝΥ.'>ΝΥΧΤΕΡΙΝΟ</option>";
        }
	
}

function orientationOption($x=""){
        $sql = "select `code`,`oname` from `orientation` ORDER BY `oname`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($row['code']==$x) { $selected = " selected "; } else { $selected = ""; }
		echo "<option $selected value='".$row['code']."'>".$row['oname']."</option>\n";
	}
	
}


function municipalitiesOption($x=""){
	$sql = "select `id`,`name` from `nomoi` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($row['id']==$x) { $selected = " selected "; } else { $selected = ""; }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}

function thriskiesOption($x=""){
	$sql = "select `id`,`name` from `thriskies` ORDER BY `name`;";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)){
		if ($row['id']==$x) { $selected = " selected "; } else { $selected = ""; }
		echo "<option $selected value='".$row['id']."'>".$row['name']."</option>\n";
	}
}

?>