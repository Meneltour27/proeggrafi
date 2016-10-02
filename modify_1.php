<?php
    function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
          
          
    function setCurrentValue($r,$c){
        foreach ($r as $k => $v){
            if ($k == $c){
                return $v;
            }
        }
        return "";
    }

include_once("functions/lists.php");
    if ((!isset($_POST['sent']))&&(!isset($_POST['sent1']))){
?>

<form action="" method="POST">
    <input type="hidden" name="sent" id="sent">
    <table>
        <tr>
            <th>
                ΑΡΧΙΚΑ
            </th>
            <td>
                <input type="text" name="username" id="username">
            </td>
        </tr>
        <tr>
            <th>
                ΚΩΔΙΚΟΣ
            </th>
            <td>
                <input type="text" name="pass" id="pass">
            </td>
        </tr>
        
        <tr>
            <th colspan="2">
               
                <input type="submit" name="s" id="s" value="ΑΝΑΖΗΤΗΣΗ">
            </th>
        </tr>
    </table>
</form>

<?php
    }
    else if ((isset($_POST['sent']))&&(!isset($_POST['sent1']))){
        
        
        
        
        $username = test_input($_POST['username']);
        $pass = test_input($_POST['pass']);
        
        
        $SQL = "select ";
        $SQL .= "`sc_ardeltiou`,";// varchar(50) not null primary key, /* αρ. δελτίου - κωδικός υποψηφίου*/
        $SQL .= "`arxika`,";//  
        $SQL .= "`last`,";// 
        $SQL .= "`first`,";// 
        $SQL .= "`department_ID`,";// /* κωδικός τμήματος */ <----
        $SQL .= "`middle`,";// 
        $SQL .= "`fname`,";//  /* όνομα πατρός */
        $SQL .= "fname_gen,";//  /* όνομα πατρός στη γενική */
        $SQL .= "mname,";//  /* όνομα μητρός */
        $SQL .= "mname_gen,";//  /* όνομα μητρός  στη γενική */
        $SQL .= "mlast,";//  /* επώνυμο μητρός */
        $SQL .= "sex,";//  /* A ή Θ */
        $SQL .= "maritalstatusID,";//  
        $SQL .= "syzname,";//  /* όνομα συζύγου */
        $SQL .= "childs_num,";//  πλήθος τέκνων --> NULL */
        $SQL .= "dimotologio,";//  /* αριθ. δημοτολογίου */
        $SQL .= "dimotologio_topos,";//  /* δήμος εγγραφής δημοτολογίου */
        $SQL .= "dimotologioregion,";//  νομός - περιοχή δημοτολογίου */
        $SQL .= "mitroo_num,";//  /* αριθ. μητρώου αρένων */
        $SQL .= "mitroo_topos,";//  /* δήμος εγγραφής μητρώου αρένων */
        $SQL .= "mitrooregion,";// /* νομός - περιοχή μητρώου αρρένων */
        $SQL .= "IDtype,";// /* Α --> Αστυνομική ταυτότητα, Δ --> Διαβατήριο, Ο --> ειδικό δελτίο ταυτότητας ομογενούς, Σ --> στρατιωτική */
        $SQL .= "IDnum,";//  /* αριθ. ταυτότητας */
        $SQL .= "DATE_FORMAT(IDdate,'%d/%m/%Y') as IDdate,";// /* ημ. έκδοσης ταυτότητας */
        $SQL .= "IDarxi,";//  /* εκδούσα αρχή ταυτότητας */
        $SQL .= "DATE_FORMAT(birthdate,'%d/%m/%Y') as birthdate,";// /* ΗΗ/ΜΜ/ΕΕΕΕ */
        $SQL .= "birthregion,";// /* νομός - περιοχή γέννησης */
        $SQL .= "placeofbirth,";//  /* Πόλη για Ελλάδα, Πόλη - Χώρα για εκτός ελλάδας */
        $SQL .= "religionID,";// δείτε το excel */
        $SQL .= "nationalityID,";// * δείτε το excel */
        $SQL .= "haddress,";// , /* διεύθυνση οικίας */
        $SQL .= "hzip,";// , /* ταχ. κώδικας οικίας */
        $SQL .= "hcity,";// /* πόλη οικίας */
        $SQL .= "hcountry,";//  , /* χώρα οικίας */
        $SQL .= "hphone,";// /* τηλ. οικίας */
        $SQL .= "hregion,";// /* νομός - περιοχή οικίας */
        $SQL .= "uaddress,";//  /*προσωρινή διεύθυνση */
        $SQL .= "uzip,";//  /* ταχ. κώδικας προσωρινής διεύθυνσης */
        $SQL .= "ucity,";// , /* πόλη προσωρινής διεύθυνσης */
        $SQL .= "ucountry,";//  /* χώρα προσωρινής διεύθυνσης */
        $SQL .= "uphone,";//  /* τηλ. προσωρινής διεύθυνσης */
        $SQL .= "uregion,";//  /* νομός - περιοχή προσωρινής κατοικίας */
        $SQL .= "email,";//  /* NULL */
        $SQL .= "mobilephone,";//  /* κιν. τηλ. */
        $SQL .= "studentCode,";//  /* Α.Μ. */
        $SQL .= "sc_schapof,";//  /* σχολείο αποφοίτησης */
        $SQL .= "sc_apofYear,";//  /* έτος αποφοίτησης */
        $SQL .= "sc_arapolit,";//  /* αριθ. απολυτηρίου */
        $SQL .= "sc_apolgrade,";// , /* βαθμός απολυτηρίου */
        $SQL .= "sc_diagogi,";//  /* διαγωγή */
        $SQL .= "sc_arseiras,";//  /* σειρά επιτυχίας */
        $SQL .= "DATE_FORMAT(in_date,'%d/%m/%Y') as in_date,";//  /* ημερομηνία εγγραφής */
        $SQL .= "in_points,";// /* μόρια εισαγωγής */
        $SQL .= "in_year,";//  /* έτος εισαγωγής */
        $SQL .= "in_modeID,";//  /* τρόπος εισαγωγής, δείτε excel */
        $SQL .= "milit,";//  /* στρατιωτική θητεία */
        $SQL .= "progrspoud_ID,";//  /* παράμετρος που δίνεται ανά τμήμα */
        $SQL .= "catID,";//  /* 101 - ενεργός*/
        $SQL .= "in_exam_ID,";// /* αριθ. εξαμήνου --> 1 */
        $SQL .= "in_period_ID, ";
        $SQL .= "`school_name`,  ";
        $SQL .= "`school_type`,  ";
        $SQL .= "`orientation`,  ";
        $SQL .= "`pref`,  ";
        $SQL .= "`gvp`,  ";
        $SQL .= "`amav`,  ";
        $SQL .= "`school_code`,  ";
        $SQL .= "`sc_name`,  ";
        $SQL .= "`sc_code` ";
        $SQL .= " from `userinfo` join `useradditionalinfo` on `sc_ardeltiou`=`code` ";
        $SQL .= " where sc_ardeltiou = '".$pass."' and ";
        $SQL .= " CONCAT(LEFT(`last`,1),LEFT(`first`,1),LEFT(`fname`,1),LEFT(`mname`,1)) = '".$username."'  ";
        $SQL .= ";";
        //echo $SQL;
        $result = mysql_query($SQL) or die(mysql_error());
        if (mysql_num_rows($result)==1){
            $row=mysql_fetch_assoc($result);
        
        
        ?>

        
        <form action="" method="post" id="myform">
            <ul class="tab">
                        <li><a href="#" class="tablinks active" onclick="openCity(event, 'tab0')">ΠΡΟΣΩΠΙΚΑ ΣΤΟΙΧΕΙΑ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab1')">ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ ΑΠΟΦΟΙΤΗΣΗΣ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab2')">ΣΤΟΙΧΕΙΑ ΣΧΟΛΗΣ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab3')">ΚΑΤΟΙΚΙΑ</a></li>
                    </ul>
                            <div id='tab0'  class="tabcontent" STYLE="display:block">
            <input type="hidden" name="sent1" id="sent1" value="1" >
           
            <table class='form'>
            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΥΠΟΨΗΦΙΟΥ
            </th>
            <td>
                <input readonly type="text" name="code" id="code" value="<?php echo setCurrentValue($row,'sc_ardeltiou'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΠΩΝΥΜΟ
            </th>
            <td>
            <input readonly type="text" name="sname" id="sname"  value="<?php echo setCurrentValue($row,'last'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ
            </th>
            <td>
            <input readonly type="text" name="fname" id="fname"  value="<?php echo setCurrentValue($row,'first'); ?>">
            </td>
            </tr>

            <th>
            ΜΕΣΑΙΟ ΟΝΟΜΑ
            </th>
            <td>
            <input readonly type="text" name="middle" id="middle"  value="<?php echo setCurrentValue($row,'middle'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΠΑΤΡΟΣ
            </th>
            <td>
            <input readonly type="text" name="father" id="father"  value="<?php echo setCurrentValue($row,'fname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ONOMA ΠΑΤΡΟΣ (ΣΤΗΝ ΓΕΝΙΚΗ)
            </th>
            <td>
            <input type="text" name="fatherg" id="fatherg"  value="<?php echo setCurrentValue($row,'fname_gen'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΜΗΤΡΟΣ
            </th>
            <td>
            <input readonly type="text" name="mother" id="mother"  value="<?php echo setCurrentValue($row,'mname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΜΗΤΡΟΣ (ΣΤΗΝ ΓΕΝΙΚΗ)
            </th>
            <td>
            <input type="text" name="motherg" id="motherg"  value="<?php echo setCurrentValue($row,'mname_gen'); ?>">
            </td>
            </tr>

            <th>
            ΕΠΩΝΥΜΟ ΜΗΤΡΟΣ
            </th>
            <td>
            <input type="text" name="last" id="last"  value="<?php echo setCurrentValue($row,'mlast'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΤΟΣ ΓΕΝΝΗΣΕΩΣ
            </th>
            <td>
            <select name="dob" id="dob">
            <?php
            for ($i=1960;$i<date('Y')-17;$i++){
            echo "<option ";
            
            if ($i==substr($row['birthdate'],strlen($row['birthdate'])-4,4)) { echo " selected "; }
            echo " value='$i' ";
            echo ">$i</option>";
            }
            ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΦΥΛΛΟ
            </th>
            <td>
            <select name="gender" id="gender">
            <?php sexOptions(setCurrentValue($row,'sex')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΟΙΚΟΓΕΝΕΙΑΚΗ ΚΑΤΑΣΤΑΣΗ
            </th>
            <td>
            <select name="marital_status" id="marital_status">
                <?php maritalStatus(setCurrentValue($row,'maritalstatusID')); ?>
            </select>
            </td>
            </tr>

            <th>
            ΟΝΟΜΑΤΕΠΩΝΥΜΟ ΣΥΖΥΓΟΥ
            </th>
            <td>
            <input type="text" name="syzygos" id="syzygos"  value="<?php echo setCurrentValue($row,'syzname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΤΕΚΝΩΝ
            </th>
            <td>
            <select name="kids" id="kids">
            <?php
            for ($i=0;$i<10;$i++){
                if (setCurrentValue($row,'childs_num')==$i){
                    $selected = " selected ";
                }
                else {
                    $selected = "  ";
                }
                echo "<option $selected value='$i'>$i</option>";
            }
            ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΣΤΡΑΤΙΩΤΙΚΕΣ ΥΠΟΧΡΕΩΣΕΙΣ
            </th>
            <td>
            <select name="milit" id="milit">
            <?php militaryOptions(setCurrentValue($row,'milit')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <input type="text" name="dimotologio" id="dimotologio"   value="<?php echo setCurrentValue($row,'dimotologio'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <select name="dimotologio_nomos" id="dimotologio_nomos">
            <?php  regionsOption(setCurrentValue($row,'dimotologioregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΔΗΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <input type="text" name="dimotologio_dhmos" id="dimotologio_dhmos"   value="<?php echo setCurrentValue($row,'dimotologio_topos'); ?>">

            </td>
            </tr>



            <tr>
            <th>
            ΜΗΤΡΩΟ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <input type="text" name="mitroo_arenon" id="mitroo_arenon"   value="<?php echo setCurrentValue($row,'mitroo_num'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ ΜΗΤΡΩΟΥ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <select name="mitroo_arenon_nomos" id="mitroo_arenon_nomos">
            <?php  regionsOption(setCurrentValue($row,'mitrooregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΔΗΜΟΣ ΜΗΤΡΩΟΥ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <input type="text" name="mitroo_arenon_dhmos" id="mitroo_arenon_dhmos"   value="<?php echo setCurrentValue($row,'mitroo_topos'); ?>">


            </td>
            </tr>

            <tr>
            <th>
            ΕΙΔΟΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <select name="id_type" id="id_type">
            <?php  idOptions(setCurrentValue($row,'IDtype')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <input type="text" name="id" id="id"    value="<?php echo setCurrentValue($row,'IDnum'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΚΔΙΔΟΥΣΑ ΑΡΧΗ
            </th>
            <td>
            <input type="text" name="id_authority" id="id_authority"    value="<?php echo setCurrentValue($row,'IDarxi'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΕΚΔΟΣΗΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <input type="text" name="id_date" id="id_date"    value="<?php echo setCurrentValue($row,'IDdate'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΓΕΝΝΗΣΕΩΣ
            </th>
            <td>
            <input type="text" name="fulldob" id="fulldob"    value="<?php echo setCurrentValue($row,'birthdate'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΕΡΙΟΧΗ ΓΕΝΝΗΣΕΩΣ (ΝΟΜΟΣ [ΧΩΡΑ])
            </th>
            <td>
            <select name="birthregion" id="birthregion">
            <?php  regionsOption(setCurrentValue($row,'birthregion')); ?>
            </select>
            <select name="birthregionnotgreece" id="birthregionnotgreece">
            <?php  natiolalitiesOption(setCurrentValue($row,'	nationalityID'));  ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΠΟΛΗ ΓΕΝΝΗΣΕΩΣ 
            </th>
            <td>
            <input type="text" name="birthcity" id="birthcity"    value="<?php echo setCurrentValue($row,'placeofbirth'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΘΡΗΣΚΕΥΜΑ
            </th>
            <td>
            <select name="religion" id="religion">
            <?php  thriskiesOption(setCurrentValue($row,'religionID')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΕΘΝΙΚΟΤΗΤΑ
            </th>
            <td>
            <select name="nationality" id="nationality">
            <?php  natiolalitiesOption(setCurrentValue($row,'nationalityID'));  ?>
            </select>
            </td>
            </tr>
            </table>
                            </div>
                <div id="tab1" class="tabcontent">
                    <table class="form">
            <tr>
            <th>
            ΟΝΟΜΑΣΙΑ ΣΧΟΛΕΙΟΥ
            </th>
            <td>
            <input readonly  type="text" name="schoolname" id="schoolname"    value="<?php echo setCurrentValue($row,'school_name'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΛΕΙΤΟΥΡΓΙΑ ΣΧΟΛΕΙΟΥ
            </th>
            <td>
            <select disabled  name="schooltype" id="schooltype">
                <?php schooltypeOption(setCurrentValue($row,'school_type')); ?>
            
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΣΧΟΛΕΙΟΥ
            </th>
            <td>
            <input readonly  type="text" name="schoolcode" id="schoolcode"   value="<?php echo setCurrentValue($row,'school_code'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΜΑΘΗΤΗ
            </th>
            <td>
            <input readonly  type="text" name="studentCode" id="studentCode"  value="<?php echo setCurrentValue($row,'studentCode'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΤΟΣ ΑΠΟΦΟΙΤΗΣΗΣ
            </th>
            <td>
            <select    name="sc_apofYear" id="sc_apofYear">
            <?php
            for ($i=1980;$i<=date('Y');$i++){
            echo "<option value='$i' ";
            if ($i==setCurrentValue($row,'sc_apofYear')) { echo " selected "; }
            echo ">$i</option>";
            }
            ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΑΠΟΛΥΤΗΡΙΟΥ
            </th>
            <td>
            <input type="text" name="sc_arapolit" id="sc_arapolit"  value="<?php echo setCurrentValue($row,'sc_arapolit'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΒΑΘΜΟΣ ΑΠΟΛΥΤΗΡΙΟΥ
            </th>
            <td>
            <input type="text" name="sc_apolgrade"  value="<?php echo setCurrentValue($row,'sc_apolgrade'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΔΙΑΓΩΓΗ
            </th>
            <td>
            <input type="text" name="sc_diagogi" id="sc_diagogi" value="<?php echo setCurrentValue($row,'sc_diagogi'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΚΑΤΕΥΘΗΝΣΗ
            </th>
            <td>
            <select disabled name="orientation" id="orientation">
            <?php orientationOption(setCurrentValue($row,'orientation')); ?>
            </select>
            </td>
            </tr>

                    </table>
                </div>
                <div id="tab2" class="tabcontent">
                    <table class="form">
            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΣΧΟΛΗΣ
            </th>
            <td>
            <input  readonly type="text" name="ucode" id="ucode"  value="500">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑΣΙΑ ΣΧΟΛΗΣ
            </th>
            <td>
            <input  readonly type="text" name="uname" id="uname"  value="<?php echo setCurrentValue($row,'sc_name'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΚΩΔΙΚΟΣ TMHMAΤΟΣ
            </th>
            <td>
                <select disabled name="department" id="department">
                    <?php departmentOption(setCurrentValue($row,'department_ID')); ?>
                </select>
           
            </td>
            </tr>

            <tr>
            <th>
            ΕΙΔΟΣ ΘΕΣΗΣ
            </th>
            <td>
            <select disabled name="positiontype" id="positiontype">
            <?php positionTypesOption(setCurrentValue($row,'in_modeID')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΣΕΙΡΑ ΕΠΙΤΥΧΙΑΣ
            </th>
            <td>
            <input  readonly type="text" name="rank" id="rank"   value="<?php echo setCurrentValue($row,'sc_arseiras'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΣΕΙΡΑ ΠΡΟΤΙΜΗΣΗΣ
            </th>
            <td>
            <input  readonly type="text" name="crank" id="crank"  value="<?php echo setCurrentValue($row,'pref'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΜΟΡΙΑ
            </th>
            <td>
            <input  readonly type="text" name="points" id="points"  value="<?php echo setCurrentValue($row,'in_points'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΓΒΠ
            </th>
            <td>
            <input  readonly type="text" name="GVP" id="GVP"  value="<?php echo setCurrentValue($row,'gvp'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            AMAB
            </th>
            <td>
            <input  readonly type="text" name="AMAB" id="AMAB"  value="<?php echo setCurrentValue($row,'amav'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΕΓΓΡΑΦΗΣ
            </th>
            <td>
            <input type="text" name="in_date" id="in_date"  value="<?php echo setCurrentValue($row,'in_date'); ?>">
            </td>
            </tr>
                    </table>
                </div>
                    <div id="tab3" class="tabcontent">
                        <table class="form">

            <tr>
            <th>
            ΔΙΕΥΘΥΝΣΗ 
            </th>
            <td>
            <input type="text" name="address" id="address"  value="<?php echo setCurrentValue($row,'haddress'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΟΛΗ 
            </th>
            <td>
            <input type="text" name="city" id="city"   value="<?php echo setCurrentValue($row,'hcity'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ / ΠΕΡΙΟΧΗ 
            </th>
            <td>
            <select name="region" id="region">
            <?php  regionsOption(setCurrentValue($row,'hregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ 
            </th>
            <td>
            <input type="text" name="zip" id="zip"  value="<?php echo setCurrentValue($row,'hzip'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΧΩΡΑ 
            </th>
            <td>
            <select name="country" id="country">
            <?php  natiolalitiesOption(setCurrentValue($row,'hcountry')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΣΤΑΘΕΡΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input type="text" name="phone" id="phone"  value="<?php echo setCurrentValue($row,'hphone'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΔΙΕΥΘΥΝΣΗ 
            </th>
            <td>
            <input type="text" name="uaddress" id="uaddress"  value="<?php echo setCurrentValue($row,'uaddress'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΠΟΛΗ 
            </th>
            <td>
            <input type="text" name="ucity" id="ucity"  value="<?php echo setCurrentValue($row,'ucity'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟΣ ΝΟΜΟΣ / ΠΕΡΙΟΧΗ 
            </th>
            <td>
            <select name="uregion" id="uregion">
            <?php  regionsOption(setCurrentValue($row,'uregion')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΧΩΡΑ 
            </th>
            <td>
            <select name="ucountry" id="ucountry">
            <?php  natiolalitiesOption(setCurrentValue($row,'ucountry')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟΣ ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ 
            </th>
            <td>
            <input type="text" name="uzip" id="uzip"  value="<?php echo setCurrentValue($row,'uzip'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟ ΣΤΑΘΕΡΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input type="text" name="uphone" id="uphone"  value="<?php echo setCurrentValue($row,'uphone'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΚΙΝΗΤΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input type="text" name="mobile" id="mobile"  value="<?php echo setCurrentValue($row,'mobilephone'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            EMAIL
            </th>
            <td>
            <input type="text" name="email" id="email"  value="<?php echo setCurrentValue($row,'email'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            progrspoud_ID
            </th>
            <td>
            <input type="text" name="progrspoud_ID" id="progrspoud_ID"  value="<?php echo setCurrentValue($row,'progrspoud_ID'); ?>">
            </td>
            </tr>
            <tr>
            <th colspan="2">

            </th>
            </tr>
            </table>
            </div>

            <input type="submit" value="ΚΑΤΑΧΩΡΗΣΗ"  class="button">
            </form>
            <script type="text/javascript">
                var frmvalidator  = new Validator("myform");

                frmvalidator.addValidation("code","req","Ο Κωδικός Υποψηφίου είναι απαραίτητος");
                frmvalidator.addValidation("sname","req","Το επώνυμο του υποψηφίου είναι απαραίτητο");
                frmvalidator.addValidation("fname","req","Το όνομα του υποψηφίου είναι απαραίτητο");
                frmvalidator.addValidation("father","req","Το όνομα του πατέρα είναι απαραίτητο");
                frmvalidator.addValidation("fatherg","req","Το όνομα του πατέρα σε γενική πτώση είναι απαραίτητο");
                frmvalidator.addValidation("mother","req","Το όνομα της μητέρας είναι απαραίτητο");
                frmvalidator.addValidation("motherg","req","Το όνομα της μητέρας σε γενική πτώση είναι απαραίτητο");
                frmvalidator.addValidation("last","req","Το επώνυμο της μητέρας είναι απαραίτητο");
                //ολα μεγαλύτερα του 3
                frmvalidator.addValidation("dimotologio","req","Ο αριθμός δημοτολογίου είναι απαραίτητος");
                frmvalidator.addValidation("dimotologio_dhmos","req","Ο δήμος δημοτολογίου είναι απαραίτητος");
                frmvalidator.addValidation("mitroo_arenon","req","Ο αριθμός μητρώου αρρένων είναι απαραίτητος");

                frmvalidator.addValidation("mitroo_arenon_dhmos","req","Ο δήμος του μητρώου αρρένω είναι απαραίτητος");
                frmvalidator.addValidation("id","req","Ο αριθμός ταυτότητας (ή άλλου αντίστοιχου εγγράφου) είναι απαραίτητος");
                frmvalidator.addValidation("id_authority","req","Ο φορέας έκδοσης είναι απαραίτητος");
                frmvalidator.addValidation("id_date","req","Η ημερομηνία έκδοσης είναι απαραίτητη");
                frmvalidator.addValidation("fulldob","req","Η ημερομηνία γεννήσεως είναι απαραίτητη");
                frmvalidator.addValidation("birthcity","req","Η πόλη γεννήσεως είναι απαραίτητη");
                frmvalidator.addValidation("schoolname","req","Η ονομασία του σχολείου είναι απαραίτητη");
                frmvalidator.addValidation("schoolcode","req","Ο κωδικός του σχολείου είναι απαραίτητος");
                /*frmvalidator.addValidation("studentCode","req","Ο κωδικός του μαθητή είναι απαραίτητος");*/
                frmvalidator.addValidation("sc_arapolit","req","Ο αριθμός απολυτηρίου είναι απαραίτητος"); 
                
                frmvalidator.addValidation("sc_apolgrade","req","Ο βαθμός απολυτηρίου είναι απαραίτητος"); 
                frmvalidator.addValidation("sc_apolgrade","numeric","Ο βαθμός απολυτηρίου πρέπει να είναι αριθμός"); 
                frmvalidator.addValidation("sc_diagogi","req","Η διαγωγή είναι απαραίτητη");
                frmvalidator.addValidation("ucode","req","Ο κωδικός του εκπαιδευτικού ιδρύματος είναι απαραίτητος");
                frmvalidator.addValidation("uname","req","Η ονομασία του εκπαιδευτικού ιδρύματος είναι απαραίτητος");
                frmvalidator.addValidation("department","req","Το τμήμα φοίτησης είναι απαραίτητο");
                frmvalidator.addValidation("rank","req","Η σειρά επιτυχίας είναι απαραίτητη"); 
                frmvalidator.addValidation("rank","numeric","Η σειρά επιτυχίας πρέπει να είναι αριθμός"); 
                frmvalidator.addValidation("crank","req","Η σειρά προτίμησης είναι απαραίτητη"); 
                frmvalidator.addValidation("crank","numeric","Η σειρά προτίμησης πρέπει να είναι αριθμός"); 
                frmvalidator.addValidation("points","req","Τα μόρια είναι απαραίτητα"); (αριθμός)
                frmvalidator.addValidation("points","numeric","Τα μόρια πρέπει να είναι αριθμός"); 
                frmvalidator.addValidation("GVP","req","Το ΓΒΠ είναι απαραίτητο");
                frmvalidator.addValidation("AMAB","req","Το AMAB είναι απαραίτητο");
                frmvalidator.addValidation("in_date","req","Η ημερομηνία εγγραφής είναι απαραίτητη");
                frmvalidator.addValidation("address","req","Η διευθυνση κατοικίας είναι απαραίτητη");
                frmvalidator.addValidation("city","req","Η πόλη κατοικίας είναι απαραίτητη");
                frmvalidator.addValidation("zip","req","Ο ταχυδρομικός κώδικας κατοικίας είναι απαραίτητος"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("zip","numeric","Ο ταχυδρομικός κώδικας πρέπει να είναι αριθμός"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("zip","minlen=5","Ο ταχυδρομικός κώδικας πρέπει να αποτελείται απο 5 αριθμούς"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("zip","maxlen=5","Ο ταχυδρομικός κώδικας πρέπει να αποτελείται απο 5 αριθμούς"); //(αριθμός 5 ψηφίων)
                /* frmvalidator.addValidation("phone","req","Ο δήμος δημοτολογίου είναι απαραίτητος"); (αριθμός)*/
                frmvalidator.addValidation("uaddress","req","Η προσωρινή διευθυνση κατοικίας είναι απαραίτητη");
                frmvalidator.addValidation("ucity","req","Η προσωρινή πόλη κατοικίας είναι απαραίτητη");
                frmvalidator.addValidation("uzip","req","Ο προσωρινός ταχυδρομικός κώδικας κατοικίας είναι απαραίτητος"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("uzip","numeric","Ο ταχυδρομικός κώδικας πρέπει να είναι αριθμός"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("uzip","minlen=5","Ο ταχυδρομικός κώδικας πρέπει να αποτελείται απο 5 αριθμούς"); //(αριθμός 5 ψηφίων)
                frmvalidator.addValidation("uzip","maxlen=5","Ο ταχυδρομικός κώδικας πρέπει να αποτελείται απο 5 αριθμούς"); //(αριθμός 5 ψηφίων)

                frmvalidator.addValidation("mobile","req","Ο αριθμός κινητού τηλεφώνου είναι απαραίτητος");  //(αριθμός)
                frmvalidator.addValidation("mobile","numeric","Ο αριθμός κινητού τηλεφώνου πρέπει να είναι αριθμός");  //(αριθμός)

                frmvalidator.addValidation("email","req","Το email είναι απαραίτητο"); 
                frmvalidator.addValidation("email","email","To email δεν έχει σωστή μορφή"); 
                frmvalidator.addValidation("progrspoud_ID","req","Ο progrspoud_ID είναι απαραίτητος");

            </script>

        <?php
        
        }
        else {
            echo "Δεν υπάρχει καταχώρηση με τα στοιχεία που καταχωρήσατε!";
            
        }
    }
        else {
            $code = test_input($_POST['code']);
            $fname = test_input($_POST['fname']);
            $sname = test_input($_POST['sname']);
            $father = test_input($_POST['father']);
            $mother = test_input($_POST['mother']);
            $fatherg = test_input($_POST['fatherg']);
            $motherg = test_input($_POST['motherg']);
            $dob = test_input($_POST['dob']);
            $gender = test_input($_POST['gender']);
            $schoolcode = test_input($_POST['schoolcode']);
            $schoolname = test_input($_POST['schoolname']);
            $schooltype = test_input($_POST['schooltype']);
            $orientation = test_input($_POST['orientation']);
            $ucode = test_input($_POST['ucode']);
            $uname = test_input($_POST['uname']);
            $positiontype = test_input($_POST['positiontype']);
            $rank = test_input($_POST['rank']);
            $crank = test_input($_POST['crank']);
            $points = test_input($_POST['points']);
            $GVP = test_input($_POST['GVP']);
            $AMAB = test_input($_POST['AMAB']);
            $address = test_input($_POST['address']);
            $city = test_input($_POST['city']);
            $country = test_input($_POST['country']);
            $zip = test_input($_POST['zip']);
            $uaddress = test_input($_POST['uaddress']);
            $ucity = test_input($_POST['ucity']);
            $ucountry = test_input($_POST['ucountry']);
            $uzip = test_input($_POST['uzip']);
            $phone = test_input($_POST['phone']);
            $uphone = test_input($_POST['uphone']);
            $mobile = test_input($_POST['mobile']);
            $email = test_input($_POST['email']);
            $dept_code = test_input($_POST['department']);
            $middle = test_input($_POST['middle']);
            $last = test_input($_POST['last']);
            $marital_status = test_input($_POST['marital_status']);
            $kids = test_input($_POST['kids']);
            $syzygos = test_input($_POST['syzygos']);
            $dimos = test_input($_POST['dimotologio_dhmos']);
            $nomos = test_input($_POST['dimotologio_nomos']);
            $dimotologio = test_input($_POST['dimotologio']);
            $mitroo_arenon = test_input($_POST['mitroo_arenon']);
            $mitroo_arenon_nomos = test_input($_POST['mitroo_arenon_nomos']);
            $mitroo_arenon_dhmos = test_input($_POST['mitroo_arenon_dhmos']);
            $id_type = test_input($_POST['id_type']);
            $id = test_input($_POST['id']);
            $id_authority = test_input($_POST['id_authority']);
            $id_date = test_input($_POST['id_date']);
            $full_dob = test_input($_POST['fulldob']);
            $birthregion = test_input($_POST['birthregion']);
            $birthcity = test_input($_POST['birthcity']);
            $religion = test_input($_POST['religion']);
            $nationality = test_input($_POST['nationality']);
            $region = test_input($_POST['region']);
            $uregion = test_input($_POST['uregion']);
            $studentCode = test_input($_POST['studentCode']);
            $sc_apofYear = test_input($_POST['sc_apofYear']);
            $sc_arapolit = test_input($_POST['sc_arapolit']);
            $sc_apolgrade = test_input($_POST['sc_apolgrade']);
            $sc_diagogi = test_input($_POST['sc_diagogi']);
            $milit = test_input($_POST['milit']);
            $progrspoud_ID = test_input($_POST['progrspoud_ID']);
            $in_date = test_input($_POST['in_date']); 
            
            
         
            $onomasia_sxoleiou = test_input($_POST['schoolname']);
            $leitourgia_sxoleiou = test_input($_POST['schooltype']);
            
            $kateuthinsi_code = test_input($_POST['orientation']);
            $seira_pritimhshs = test_input($_POST['crank']);
            $gvp = test_input($_POST['GVP']);
            $amav = test_input($_POST['AMAB']);
            $sc_schapof = test_input($_POST['schoolcode']);
            $onomasia_sxolhs = test_input($_POST['uname']);
            $kodikos_sxolhs = test_input($_POST['ucode']);


            $SQL  = "insert into `userinfo` (";
            $SQL .= "`sc_ardeltiou`,";// varchar(50) not null primary key, /* αρ. δελτίου - κωδικός υποψηφίου*/
            $SQL .= "`arxika`,";//  
            $SQL .= "`last`,";// 
            $SQL .= "`first`,";// 
            $SQL .= "`department_ID`,";// /* κωδικός τμήματος */ <----
            $SQL .= "`middle`,";// 
            $SQL .= "`fname`,";//  /* όνομα πατρός */
            $SQL .= "fname_gen,";//  /* όνομα πατρός στη γενική */
            $SQL .= "mname,";//  /* όνομα μητρός */
            $SQL .= "mname_gen,";//  /* όνομα μητρός  στη γενική */
            $SQL .= "mlast,";//  /* επώνυμο μητρός */
            $SQL .= "sex,";//  /* A ή Θ */
            $SQL .= "maritalstatusID,";//  
            $SQL .= "syzname,";//  /* όνομα συζύγου */
            $SQL .= "childs_num,";//  πλήθος τέκνων --> NULL */
            $SQL .= "dimotologio,";//  /* αριθ. δημοτολογίου */
            $SQL .= "dimotologio_topos,";//  /* δήμος εγγραφής δημοτολογίου */
            $SQL .= "dimotologioregion,";//  νομός - περιοχή δημοτολογίου */
            $SQL .= "mitroo_num,";//  /* αριθ. μητρώου αρένων */
            $SQL .= "mitroo_topos,";//  /* δήμος εγγραφής μητρώου αρένων */
            $SQL .= "mitrooregion,";// /* νομός - περιοχή μητρώου αρρένων */
            $SQL .= "IDtype,";// /* Α --> Αστυνομική ταυτότητα, Δ --> Διαβατήριο, Ο --> ειδικό δελτίο ταυτότητας ομογενούς, Σ --> στρατιωτική */
            $SQL .= "IDnum,";//  /* αριθ. ταυτότητας */
            $SQL .= "IDdate,";// /* ημ. έκδοσης ταυτότητας */
            $SQL .= "IDarxi,";//  /* εκδούσα αρχή ταυτότητας */
            $SQL .= "birthdate,";// /* ΗΗ/ΜΜ/ΕΕΕΕ */
            $SQL .= "birthregion,";// /* νομός - περιοχή γέννησης */
            $SQL .= "placeofbirth,";//  /* Πόλη για Ελλάδα, Πόλη - Χώρα για εκτός ελλάδας */
            $SQL .= "religionID,";// δείτε το excel */
            $SQL .= "nationalityID,";// * δείτε το excel */
            $SQL .= "haddress,";// , /* διεύθυνση οικίας */
            $SQL .= "hzip,";// , /* ταχ. κώδικας οικίας */
            $SQL .= "hcity,";// /* πόλη οικίας */
            $SQL .= "hcountry,";//  , /* χώρα οικίας */
            $SQL .= "hphone,";// /* τηλ. οικίας */
            $SQL .= "hregion,";// /* νομός - περιοχή οικίας */
            $SQL .= "uaddress,";//  /*προσωρινή διεύθυνση */
            $SQL .= "uzip,";//  /* ταχ. κώδικας προσωρινής διεύθυνσης */
            $SQL .= "ucity,";// , /* πόλη προσωρινής διεύθυνσης */
            $SQL .= "ucountry,";//  /* χώρα προσωρινής διεύθυνσης */
            $SQL .= "uphone,";//  /* τηλ. προσωρινής διεύθυνσης */
            $SQL .= "uregion,";//  /* νομός - περιοχή προσωρινής κατοικίας */
            $SQL .= "email,";//  /* NULL */
            $SQL .= "mobilephone,";//  /* κιν. τηλ. */
            $SQL .= "studentCode,";//  /* Α.Μ. */
            $SQL .= "sc_schapof,";//  /* σχολείο αποφοίτησης */
            $SQL .= "sc_apofYear,";//  /* έτος αποφοίτησης */
            $SQL .= "sc_arapolit,";//  /* αριθ. απολυτηρίου */
            $SQL .= "sc_apolgrade,";// , /* βαθμός απολυτηρίου */
            $SQL .= "sc_diagogi,";//  /* διαγωγή */
            $SQL .= "sc_arseiras,";//  /* σειρά επιτυχίας */
            $SQL .= "in_date,";//  /* ημερομηνία εγγραφής */
            $SQL .= "in_points,";// /* μόρια εισαγωγής */
            $SQL .= "in_year,";//  /* έτος εισαγωγής */
            $SQL .= "in_modeID,";//  /* τρόπος εισαγωγής, δείτε excel */
            $SQL .= "milit,";//  /* στρατιωτική θητεία */
            $SQL .= "progrspoud_ID,";//  /* παράμετρος που δίνεται ανά τμήμα */
            $SQL .= "catID,";//  /* 101 - ενεργός*/
            $SQL .= "in_exam_ID,";// /* αριθ. εξαμήνου --> 1 */
            $SQL .= "in_period_ID) values (";//  /* 1 */

            $SQL .= "'".$code."',";
            $SQL .= "'".mb_substr($sname,0,1,'UTF-8').mb_substr($fname,0,1,'UTF-8').mb_substr($father,0,1,'UTF-8').mb_substr($mother,0,1,'UTF-8')."',";
            $SQL .= "'".$sname."',";
            $SQL .= "'".$fname."',";
            $SQL .= "'".$dept_code."',";
            $SQL .= "'".$middle."',"; 
            $SQL .= "'".$father."',";
            $SQL .= "'".$fatherg."',";
            $SQL .= "'".$mother."',";
            $SQL .= "'".$motherg."',";
            $SQL .= "'".$last."',";
            $SQL .= "'".$gender."',";
            $SQL .= "'".$marital_status."',";
            $SQL .= "'".$syzygos."',";
            $SQL .= "'".$kids."',";
            $SQL .= "'".$dimotologio."',";
            $SQL .= "'".$dimos."',";
            $SQL .= "'".$nomos."',";
            $SQL .= "'".$mitroo_arenon."',";
            $SQL .= "'".$mitroo_arenon_dhmos."',";
            $SQL .= "'".$mitroo_arenon_nomos."',";
            $SQL .= "'".$id_type."',";
            $SQL .= "'".$id."',";
            $SQL .= "str_to_date('".$id_date."','%d/%m/%Y'),";
            $SQL .= "'".$id_authority."',";
            $SQL .= "str_to_date('".$full_dob."','%d/%m/%Y'),";
            $SQL .= "'".$birthregion."',";
            $SQL .= "'".$birthcity."',";
            $SQL .= "'".$religion."',";
            $SQL .= "'".$nationality."',";
            $SQL .= "'".$address."',";
            $SQL .= "'".$zip."',";
            $SQL .= "'".$city."',";
            $SQL .= "'".$country."',";
            $SQL .= "'".$phone."',";
            $SQL .= "'".$region."',";
            $SQL .= "'".$uaddress."',";
            $SQL .= "'".$uzip."',";
            $SQL .= "'".$ucity."',";
            $SQL .= "'".$ucountry."',";
            $SQL .= "'".$uphone."',";
            $SQL .= "'".$uregion."',";
            $SQL .= "'".$email."',";
            $SQL .= "'".$mobile."',";
            $SQL .= "'".$studentCode."',";
            $SQL .= "'".$schoolcode."',";
            $SQL .= "'".$sc_apofYear."',";
            $SQL .= "'".$sc_arapolit."',";
            $SQL .= "'".$sc_apolgrade."',";
            $SQL .= "'".$sc_diagogi."',";
            $SQL .= "'".$rank."',";//  /* σειρά επιτυχίας */
            $SQL .= "str_to_date('".$in_date."','%d/%m/%Y'),";
            $SQL .= "'".$points."',";// /* μόρια εισαγωγής */
            $SQL .= "'".date('Y')."',";//  /* έτος εισαγωγής */
            $SQL .= "'".$positiontype."',";// /* τρόπος εισαγωγής, δείτε excel */
            $SQL .= "'".$milit."',";//---------------------------------------------  /* στρατιωτική θητεία */
            $SQL .= "'".$progrspoud_ID."',";//--------------------------------------,";//  /* παράμετρος που δίνεται ανά τμήμα */
            $SQL .= "'101',";//  /* 101 - ενεργός*/
            $SQL .= "'1',";// /* αριθ. εξαμήνου --> 1 */
            $SQL .= "'1')"; //  /* 1 */
            
            
            $sql1 = "insert into useradditionalinfo(`code`, `school_name`, `school_type`, `orientation`, `pref`, `gvp`, `amav`, `school_code`, `sc_name`, `sc_code`) values('";
            $sql1 .= $code ."','";
            $sql1 .= $onomasia_sxoleiou ."','";
            $sql1 .= $leitourgia_sxoleiou ."','";
            $sql1 .= $kateuthinsi_code ."','";
            $sql1 .= $seira_pritimhshs ."','";
            $sql1 .= $gvp ."','";
            $sql1 .= $amav ."','";
            $sql1 .= $sc_schapof ."','";
            $sql1 .= $onomasia_sxolhs ."','";
            $sql1 .= $kodikos_sxolhs ."');";
            
            $delete_sql = "delete from userinfo where sc_ardeltiou = '".$code."';";
            $delete_sql1 = "delete from useradditionalinfo where `code` = '".$code."';";
            mysql_query($delete_sql) or die(mysql_error());
            mysql_query($delete_sql1) or die(mysql_error());
            mysql_query($SQL) or die(mysql_error());
            mysql_query($sql1) or die(mysql_error());
            echo "Η ΤΡΟΠΟΠΟΙΗΣΗ ΤΩΝ ΣΤΟΙΧΕΙΩΝ ΣΑΣ ΕΓΙΝΕ ΜΕ ΕΠΙΤΥΧΙΑ!";
        }
    
    
    ?>

