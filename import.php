 <?php if (!isset($_SESSION['usertype'])) {die();}
?>
<?php
if (!isset($_POST['sent'])) {
    ?>
<form action="" method="post"  enctype="multipart/form-data">
<input type="hidden" value="1" name="sent" id="sent">
Επιλέξτε αρχείο:
<input type="file" name="excelfile" id="excelfile"  class="button">
<input type="submit" value="ΕΠΙΛΟΓΗ"  class="button">
</form>
<?php
} else {

    //if there was an error uploading the file
    if ($_FILES["excelfile"]["error"] > 0) {
        echo "Return Code: " . $_FILES["excelfile"]["error"] . "<br />";
    } else {
        if (file_exists($_FILES["excelfile"]["name"])) {
            unlink('uploadedFiles/' . $_FILES["excelfile"]["name"]);
        }
        $storagename = 'uploadedFiles/' . $_FILES["excelfile"]["name"];
        move_uploaded_file($_FILES["excelfile"]["tmp_name"], $storagename);
        $uploadedStatus = 1;
    }

    /************************ YOUR DATABASE CONNECTION START HERE   ****************************/

    $link = mysql_connect($HOST, $USER, $PASS) or die("Couldn't make connection.");
    $db = mysql_select_db($DB, $link) or die("Couldn't select database");

    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/

    set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
    include 'PHPExcel/IOFactory.php';

    // This is the file path to be uploaded.
    $inputFileName = $storagename;

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }

    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
    $arrayCount = count($allDataInSheet); // Here get total count of row in that Excel sheet

    for ($i = 4; $i <= $arrayCount; $i++) {
        //ΑΝΑΓΩΝΣΗ ΤΩΝ ΣΤΟΙΧΕΙΩΝ ΑΠΟ ΤΟ EXCEL
        $sc_ardeltiou = trim($allDataInSheet[$i]["A"]);
        $last = trim($allDataInSheet[$i]["B"]);
        $first = trim($allDataInSheet[$i]["C"]);
        $fname = trim($allDataInSheet[$i]["D"]);
        $mname = trim($allDataInSheet[$i]["E"]);
        //DATE STRING MANIPULATION
        $birthdate = trim($allDataInSheet[$i]["F"]);
        $birthdate = strtotime($birthdate);
        $birthdate = date('Y-m-d', $birthdate);

        $sex = trim($allDataInSheet[$i]["G"]);
        $sc_schapof = trim($allDataInSheet[$i]["H"]);
        $in_modeID = trim($allDataInSheet[$i]["N"]);
        $sc_arseiras = trim($allDataInSheet[$i]["O"]);
        $in_points = trim($allDataInSheet[$i]["Q"]);
        $onomasia_sxoleiou = trim($allDataInSheet[$i]["I"]);
        $leitourgia_sxoleiou = trim($allDataInSheet[$i]["J"]);
        $kateuthinsi = trim($allDataInSheet[$i]["K"]);
        if ($kateuthinsi == "ΘΕΩΡΗΤΙΚΗ") {
            $kateuthinsi_code = 1;
        } else if ($kateuthinsi == "ΘΕΤΙΚΗ") {
            $kateuthinsi_code = 2;
        } else if (substr($kateuthinsi, 0, strlen("ΤΕΧΝΟΛΟΓΙΚΗ ΙΙ")) == "ΤΕΧΝΟΛΟΓΙΚΗ ΙΙ") {
            $kateuthinsi_code = 4;
        } else if (substr($kateuthinsi, 0, strlen("ΤΕΧΝΟΛΟΓΙΚΗ Ι ")) == "ΤΕΧΝΟΛΟΓΙΚΗ Ι ") {
            $kateuthinsi_code = 3;
        } else {
            $kateuthinsi_code = 0;
        }
        $kodikos_sxolhs = trim($allDataInSheet[$i]["L"]);
        $onomasia_sxolhs = trim($allDataInSheet[$i]["M"]);
        $seira_pritimhshs = trim($allDataInSheet[$i]["P"]);
        $gvp = trim($allDataInSheet[$i]["R"]);
        $amav = trim($allDataInSheet[$i]["S"]);
        $in_modeID = trim($allDataInSheet[$i]["N"]);
        $sc_arseiras = trim($allDataInSheet[$i]["O"]);
        $in_points = trim($allDataInSheet[$i]["Q"]);

        mysql_query("set names 'utf-8';");
        $SQL1 = "select `id` from `in_modeID` where `name` LIKE '" . $in_modeID . "';";

        $result1 = mysql_query($SQL1);
        if (mysql_num_rows($result1) == 1) {
            $row1 = mysql_fetch_assoc($result1);
            $in_modeID = $row1['id'];
        } else {
            $in_modeID = -1;
        }
        $haddress = trim($allDataInSheet[$i]["T"]);
        $hzip = trim($allDataInSheet[$i]["U"]);
        $hphone = trim($allDataInSheet[$i]["V"]);
        $mobilephone = trim($allDataInSheet[$i]["W"]);
        $email = trim($allDataInSheet[$i]["X"]);

        //$query = "SELECT name FROM YOUR_TABLE WHERE name = '".$userName."' and email = '".$userMobile."'";
        //$sql = mysql_query($query);
        //$recResult = mysql_fetch_array($sql);
        //$existName = $recResult["name"];
        //
        $insertTable = "insert into userinfo (department_ID,arxika, sc_ardeltiou ,last,first,fname,mname,birthdate,sex,sc_schapof,in_modeID,sc_arseiras,in_points,haddress,hzip,hphone,mobilephone,email)  values('";
        $insertTable .= $kodikos_sxolhs . "','";
        $insertTable .= mb_substr($last, 0, 1, 'UTF-8') . mb_substr($first, 0, 1, 'UTF-8') . mb_substr($fname, 0, 1, 'UTF-8') . mb_substr($mname, 0, 1, 'UTF-8') . "','";
        $insertTable .= $sc_ardeltiou . "','";
        $insertTable .= $last . "','";
        $insertTable .= $first . "','";
        $insertTable .= $fname . "','";
        $insertTable .= $mname . "','";
        $insertTable .= $birthdate . "','";
        $insertTable .= $sex . "','";
        $insertTable .= $sc_schapof . "','";
        $insertTable .= $in_modeID . "','";
        $insertTable .= $sc_arseiras . "','";
        $insertTable .= $in_points . "','";
        $insertTable .= $haddress . "','";
        $insertTable .= $hzip . "','";
        $insertTable .= $hphone . "','";
        $insertTable .= $mobilephone . "','";
        $insertTable .= $email . "');";
        //echo $insertTable." <br> ";
        $insertTableAdditional = "insert into useradditionalinfo(`code`, `school_name`, `school_type`, `orientation`, `pref`, `gvp`, `amav`, `school_code`, `sc_name`, `sc_code`) values('";
        $insertTableAdditional .= $sc_ardeltiou . "','";
        $insertTableAdditional .= $onomasia_sxoleiou . "','";
        $insertTableAdditional .= $leitourgia_sxoleiou . "','";
        $insertTableAdditional .= $kateuthinsi_code . "','";
        $insertTableAdditional .= $seira_pritimhshs . "','";
        $insertTableAdditional .= $gvp . "','";
        $insertTableAdditional .= $amav . "','";
        $insertTableAdditional .= $sc_schapof . "','";
        $insertTableAdditional .= $onomasia_sxolhs . "','";
        $insertTableAdditional .= $kodikos_sxolhs . "');";
        //echo $insertTableAdditional." <hr> ";
        //echo $insertTable."<br>";

        mysql_query("set names 'utf8';");
        if (!mysql_query($insertTable)) {
            echo "Ο χρήστης με κωδικό " . $sc_ardeltiou . " δεν μπόρεσε να περαστεί στο σύστημα.<br/>";
        } else {
            if (!mysql_query($insertTableAdditional)) {
                echo "Ο χρήστης με κωδικό " . $sc_ardeltiou . " δεν μπόρεσε να περαστεί στο σύστημα.<br/>";
                mysql_query("delete from userinfo where sc_ardeltiou = '$sc_ardeltiou'");
                mysql_query("delete from useradditionalinfo where code = '$sc_ardeltiou'");
            }
        }

        //if ($email!=""){
        //$message = "Τα στοιχεία σας καταχωρήθηκαν στο ΣΥΣΤΗΜΑ ΠΡΟΕΓΓΡΑΦΗΣ ΦΟΙΤΗΤΩΝ.\n";
        //$message .="Παρακαλούμε να επικαιροποιήσετε τα στοιχεία αυτά στο http://...\n\n";
        //mailto($mail,"ΣΥΣΤΗΜΑ ΠΡΟΕΓΓΡΑΦΗΣ ΦΟΙΤΗΤΩΝ",$message);
        //}

    }
    echo "Η εισαγωγή χρηστών τελείωσε.<br/>";

}
?>
