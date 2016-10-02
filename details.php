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
        if(!isset($_POST['sent1'])){
        $id = test_input($_GET['code']);
       
        
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
        $SQL .= " where sc_ardeltiou = '".$id."'   ";
        $SQL .= ";";
        //echo $SQL;
        $result = mysql_query($SQL) or die(mysql_error());
        if (mysql_num_rows($result)==1){
            $row=mysql_fetch_assoc($result);
        
        
        ?>

        
        <form action="" method="post" id="myform">
		<input type="hidden" name="sent1" id="sent1" value="1" >
            <ul class="tab">
                        <li><a href="#" class="tablinks active" onclick="openCity(event, 'tab0')">ΠΡΟΣΩΠΙΚΑ ΣΤΟΙΧΕΙΑ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab1')">ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ ΑΠΟΦΟΙΤΗΣΗΣ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab2')">ΣΤΟΙΧΕΙΑ ΣΧΟΛΗΣ</a></li>
                        <li><a href="#" class="tablinks" onclick="openCity(event, 'tab3')">ΚΑΤΟΙΚΙΑ</a></li>
                    </ul>
                            <div id='tab0'  class="tabcontent" STYLE="display:block">
            
            <table class='form'>
            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΥΠΟΨΗΦΙΟΥ
            </th>
            <td>
                <input type="text" id="sc_ardeltiou" name="sc_ardeltiou" value="<?php echo setCurrentValue($row,'sc_ardeltiou'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΠΩΝΥΜΟ
            </th>
            <td>
            <input   type="text" id="last" name="last"  value="<?php echo setCurrentValue($row,'last'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ
            </th>
            <td>
            <input   type="text" id="first" name="first"  value="<?php echo setCurrentValue($row,'first'); ?>">
            </td>
            </tr>

            <th>
            ΜΕΣΑΙΟ ΟΝΟΜΑ
            </th>
            <td>
            <input   type="text" name="middle"  value="<?php echo setCurrentValue($row,'middle'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΠΑΤΡΟΣ
            </th>
            <td>
            <input   type="text" id="fname" name="fname" value="<?php echo setCurrentValue($row,'fname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ONOMA ΠΑΤΡΟΣ (ΣΤΗΝ ΓΕΝΙΚΗ)
            </th>
            <td>
            <input   type="text" name="fname_gen"  value="<?php echo setCurrentValue($row,'fname_gen'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΜΗΤΡΟΣ
            </th>
            <td>
            <input   type="text" id="mname" name="mname"  value="<?php echo setCurrentValue($row,'mname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑ ΜΗΤΡΟΣ (ΣΤΗΝ ΓΕΝΙΚΗ)
            </th>
            <td>
            <input   type="text" name="mname_gen"  value="<?php echo setCurrentValue($row,'mname_gen'); ?>">
            </td>
            </tr>

            <th>
            ΕΠΩΝΥΜΟ ΜΗΤΡΟΣ
            </th>
            <td>
            <input   type="text" name="mlast"  value="<?php echo setCurrentValue($row,'mlast'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΦΥΛΛΟ
            </th>
            <td>
            <select   name="sex" >
            <?php sexOptions(setCurrentValue($row,'sex')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΟΙΚΟΓΕΝΕΙΑΚΗ ΚΑΤΑΣΤΑΣΗ
            </th>
            <td>
            <select  name="maritalstatusID" >
                <?php maritalStatus(setCurrentValue($row,'maritalstatusID')); ?>
            </select>
            </td>
            </tr>

            <th>
            ΟΝΟΜΑΤΕΠΩΝΥΜΟ ΣΥΖΥΓΟΥ
            </th>
            <td>
            <input   type="text" name="syzname"  value="<?php echo setCurrentValue($row,'syzname'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΤΕΚΝΩΝ
            </th>
            <td>
            <select   name="childs_num">
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
            <select   name="milit">
            <?php militaryOptions(setCurrentValue($row,'milit')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <input   type="text" name="dimotologio"  value="<?php echo setCurrentValue($row,'dimotologio'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <select   name="dimotologioregion">
            <?php  regionsOption(setCurrentValue($row,'dimotologioregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΔΗΜΟΣ ΔΗΜΟΤΟΛΟΓΙΟΥ
            </th>
            <td>
            <input   type="text" name="dimotologio_topos" value="<?php echo setCurrentValue($row,'dimotologio_topos'); ?>">

            </td>
            </tr>



            <tr>
            <th>
            ΜΗΤΡΩΟ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <input   type="text" name="mitroo_num" value="<?php echo setCurrentValue($row,'mitroo_num'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ ΜΗΤΡΩΟΥ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <select   name="mitrooregion">
            <?php  regionsOption(setCurrentValue($row,'mitrooregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΔΗΜΟΣ ΜΗΤΡΩΟΥ ΑΡΡΕΝΩΝ
            </th>
            <td>
            <input   type="text" name="mitroo_topos" value="<?php echo setCurrentValue($row,'mitroo_topos'); ?>">


            </td>
            </tr>

            <tr>
            <th>
            ΕΙΔΟΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <select   name="IDtype">
            <?php  idOptions(setCurrentValue($row,'IDtype')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΑΡΙΘΜΟΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <input   type="text" name="IDnum" value="<?php echo setCurrentValue($row,'IDnum'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΚΔΙΔΟΥΣΑ ΑΡΧΗ
            </th>
            <td>
            <input   type="text" name="IDarxi" value="<?php echo setCurrentValue($row,'IDarxi'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΕΚΔΟΣΗΣ ΤΑΥΤΟΤΗΤΑΣ
            </th>
            <td>
            <input   type="text" name="IDdate" id="IDdate"    value="<?php echo setCurrentValue($row,'IDdate'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΓΕΝΝΗΣΕΩΣ
            </th>
            <td>
            <input   type="text" name="birthdate" id="birthdate"    value="<?php echo setCurrentValue($row,'birthdate'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΕΡΙΟΧΗ ΓΕΝΝΗΣΕΩΣ (ΝΟΜΟΣ [ΧΩΡΑ])
            </th>
            <td>
            <select   name="birthregion">
            <?php  regionsOption(setCurrentValue($row,'birthregion')); ?>
            </select>
            <select   name="nationalityID">
            <?php  natiolalitiesOption(setCurrentValue($row,'nationalityID'));  ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΠΟΛΗ ΓΕΝΝΗΣΕΩΣ 
            </th>
            <td>
            <input   type="text" name="placeofbirth" value="<?php echo setCurrentValue($row,'placeofbirth'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΘΡΗΣΚΕΥΜΑ
            </th>
            <td>
            <select   name="religionID">
            <?php  thriskiesOption(setCurrentValue($row,'religionID')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΕΘΝΙΚΟΤΗΤΑ
            </th>
            <td>
            <select   name="nationalityID">
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
            <input   type="text" name="school_name" value="<?php echo setCurrentValue($row,'school_name'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΛΕΙΤΟΥΡΓΙΑ ΣΧΟΛΕΙΟΥ
            </th>
            <td>
            <select   name="school_type">
                <?php schooltypeOption(setCurrentValue($row,'school_type')); ?>
            
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΣΧΟΛΕΙΟΥ
            </th>
            <td>
            <input   type="text" name="school_code" value="<?php echo setCurrentValue($row,'school_code'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΚΩΔΙΚΟΣ ΜΑΘΗΤΗ
            </th>
            <td>
            <input   type="text" name="studentCode" value="<?php echo setCurrentValue($row,'studentCode'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΕΤΟΣ ΑΠΟΦΟΙΤΗΣΗΣ
            </th>
            <td>
            <select    name="sc_apofYear">
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
            <input   type="text" name="sc_arapolit" value="<?php echo setCurrentValue($row,'sc_arapolit'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΒΑΘΜΟΣ ΑΠΟΛΥΤΗΡΙΟΥ
            </th>
            <td>
            <input   type="text" name="sc_apolgrade"  value="<?php echo setCurrentValue($row,'sc_apolgrade'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΔΙΑΓΩΓΗ
            </th>
            <td>
            <input   type="text" name="sc_diagogi" value="<?php echo setCurrentValue($row,'sc_diagogi'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΚΑΤΕΥΘΗΝΣΗ
            </th>
            <td>
            <select  name="orientation">
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
            <input   type="text" name="department_ID" value="<?php echo setCurrentValue($row,'department_ID'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΟΝΟΜΑΣΙΑ ΣΧΟΛΗΣ
            </th>
            <td>
            <input   type="text" name="sc_name" value="<?php echo setCurrentValue($row,'sc_name'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΚΩΔΙΚΟΣ TMHMAΤΟΣ
            </th>
            <td>
                <select  name="department_ID">
                    <?php departmentOption(setCurrentValue($row,'department_ID')); ?>
                </select>
           
            </td>
            </tr>

            <tr>
            <th>
            ΕΙΔΟΣ ΘΕΣΗΣ
            </th>
            <td>
            <select  name="in_modeID">
            <?php positionTypesOption(setCurrentValue($row,'in_modeID')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΣΕΙΡΑ ΕΠΙΤΥΧΙΑΣ
            </th>
            <td>
            <input   type="text" name="sc_arseiras" value="<?php echo setCurrentValue($row,'sc_arseiras'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΣΕΙΡΑ ΠΡΟΤΙΜΗΣΗΣ
            </th>
            <td>
            <input   type="text" name="pref" value="<?php echo setCurrentValue($row,'pref'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΜΟΡΙΑ
            </th>
            <td>
            <input   type="text" name="in_points" value="<?php echo setCurrentValue($row,'in_points'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΓΒΠ
            </th>
            <td>
            <input   type="text" name="gvp" value="<?php echo setCurrentValue($row,'gvp'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            AMAB
            </th>
            <td>
            <input   type="text" name="amav" value="<?php echo setCurrentValue($row,'amav'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΗΜΕΡΟΜΗΝΙΑ ΕΓΓΡΑΦΗΣ
            </th>
            <td>
            <input   type="text" name="in_date" id="in_date" value="<?php echo setCurrentValue($row,'in_date'); ?>">
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
            <input   type="text" name="haddress" value="<?php echo setCurrentValue($row,'haddress'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΟΛΗ 
            </th>
            <td>
            <input   type="text" name="hcity" value="<?php echo setCurrentValue($row,'hcity'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΝΟΜΟΣ / ΠΕΡΙΟΧΗ 
            </th>
            <td>
            <select   name="hregion">
            <?php  regionsOption(setCurrentValue($row,'hregion')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ 
            </th>
            <td>
            <input   type="text" name="hzip" value="<?php echo setCurrentValue($row,'hzip'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΧΩΡΑ 
            </th>
            <td>
            <select   name="hcountry">
            <?php  natiolalitiesOption(setCurrentValue($row,'hcountry')); ?>
            </select>
            </td>
            </tr>

            <tr>
            <th>
            ΣΤΑΘΕΡΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input   type="text" name="hphone" value="<?php echo setCurrentValue($row,'hphone'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΔΙΕΥΘΥΝΣΗ 
            </th>
            <td>
            <input   type="text" name="uaddress" value="<?php echo setCurrentValue($row,'uaddress'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΠΟΛΗ 
            </th>
            <td>
            <input   type="text" name="ucity" value="<?php echo setCurrentValue($row,'ucity'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟΣ ΝΟΜΟΣ / ΠΕΡΙΟΧΗ 
            </th>
            <td>
            <select   name="uregion">
            <?php  regionsOption(setCurrentValue($row,'uregion')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΗ ΧΩΡΑ 
            </th>
            <td>
            <select   name="ucountry">
            <?php  natiolalitiesOption(setCurrentValue($row,'ucountry')); ?>
            </select>
            </td>
            </tr>


            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟΣ ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ 
            </th>
            <td>
            <input   type="text" name="uzip" value="<?php echo setCurrentValue($row,'uzip'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            ΠΡΟΣΩΡΙΝΟ ΣΤΑΘΕΡΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input   type="text" name="uphone" value="<?php echo setCurrentValue($row,'uphone'); ?>">
            </td>
            </tr>


            <tr>
            <th>
            ΚΙΝΗΤΟ ΤΗΛΕΦΩΝΟ
            </th>
            <td>
            <input   type="text" name="mobilephone" value="<?php echo setCurrentValue($row,'mobilephone'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            EMAIL
            </th>
            <td>
            <input  type="text" name="email" value="<?php echo setCurrentValue($row,'email'); ?>">
            </td>
            </tr>

            <tr>
            <th>
            progrspoud_ID
            </th>
            <td>
            <input  type="text" name="progrspoud_ID" value="<?php echo setCurrentValue($row,'progrspoud_ID'); ?>">
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
                frmvalidator.addValidation("sc_ardeltiou","req","Ο Κωδικός Υποψηφίου είναι απαραίτητος");
                frmvalidator.addValidation("last","req","Το επώνυμο του υποψηφίου είναι απαραίτητο");
                frmvalidator.addValidation("first","req","Το όνομα του υποψηφίου είναι απαραίτητο");
                frmvalidator.addValidation("fname","req","Το όνομα του πατέρα είναι απαραίτητο");
                frmvalidator.addValidation("mname","req","Το όνομα της μητέρας είναι απαραίτητο");
            </script>
        <?php
        }
        else {
            echo "Σφάλμα στην προβολή στοιχείων!!!";
        }
	}else{
		
		//mb_substr($sname,0,1,'UTF-8').mb_substr($fname,0,1,'UTF-8').mb_substr($father,0,1,'UTF-8').mb_substr($mother,0,1,'UTF-8')."',";
		
			$userArray = array(
				"sc_ardeltiou" => true,
				"arxika" => true,
				"last" => true,
				"first" => true,
				"department_ID" => true,
				"middle" => true,
				"fname" => true,
				"fname_gen" => true,
				"mname" => true,
				"mname_gen" => true,
				"mlast" => true,
				"sex"  => true,
				"maritalstatusID" => true,
				"syzname" => true,
				"childs_num" => true,
				"dimotologio" => true,
				"dimotologio_topos" => true,
				"dimotologioregion" => true,
				"mitroo_num" => true,
				"mitroo_topos" => true,
				"mitrooregion" => true,
				"IDtype" => true,
				"IDnum" => true,
				"IDdate" => true,
				"IDarxi" => true,
				"birthdate" => true,
				"birthregion" => true,
				"placeofbirth" => true,
				"religionID" => true,
				"nationalityID" => true,
				"haddress" => true,
				"hzip" => true,
				"hcity" => true,
				"hcountry" => true,
				"hphone" => true,
				"hregion" => true,
				"uaddress" => true,
				"uzip" => true,
				"ucity" => true,
				"ucountry" => true,
				"uphone" => true,
				"uregion" => true,
				"email" => true,
				"mobilephone" => true,
				"studentCode" => true,
				"sc_schapof" => true,
				"sc_apofYear" => true,
				"sc_arapolit" => true,
				"sc_apolgrade" => true,
				"sc_diagogi" => true,
				"sc_arseiras" => true,
				"in_date" => true,
				"in_points" => true,
				"in_year" => true,
				"in_modeID" => true,
				"milit" => true,
				"progrspoud_ID" => true,
				"catID" => true,
				"in_exam_ID" => true,
				"in_period_ID" => true,
				"school_name" => true,
				"school_type" => true,
				"orientation" => true,
				"pref" => true,
				"school_code" => true,
				"sc_name" => true,
				"sc_code" => true,
				"amav" => true,
				"gvp" => true);
				
			print_r($_POST);
			echo '<br/>';
			echo '<br/>';
			echo '<br/>';
			print_r($userArray);
			echo '<br/>';
			print_r($userExtraArray);
			echo '<br/>';
			exit();
			$userArray[0] = "userinfo";
			$userExtraArray[0] = "useradditionalinfo";
			
            $code = test_input($_POST['code']);
			$userArray['sc_ardeltiou'] = $code;
			$userExtraArray['code'] = $code;
			
			if(isset($_POST['fname'])){
				$fname = test_input($_POST['fname']);
				$userArray['fname'] = $fname;
			}
			if(isset($_POST['sname'])){
				$sname = test_input($_POST['sname']);
				$userArray['sname'] = $sname;
			}
			if(isset($_POST['father']))
				$father = test_input($_POST['father']);
			
			if(isset($_POST['mother']))
				$mother = test_input($_POST['mother']);
			
			if(isset($_POST['fatherg']))
				$fatherg = test_input($_POST['fatherg']);
			if(isset($_POST['motherg']))
				$motherg = test_input($_POST['motherg']);
			if(isset($_POST['dob']))
				$dob = test_input($_POST['dob']);
			if(isset($_POST['gender']))
            $gender = test_input($_POST['gender']);
			if(isset($_POST['schoolcode']))
				$schoolcode = test_input($_POST['schoolcode']);
			if(isset($_POST['schoolname']))
				$schoolname = test_input($_POST['schoolname']);
			if(isset($_POST['schooltype']))
				$schooltype = test_input($_POST['schooltype']);
			if(isset($_POST['orientation']))
				$orientation = test_input($_POST['orientation']);
			if(isset($_POST['ucode']))
				$ucode = test_input($_POST['ucode']);
			if(isset($_POST['uname']))
				$uname = test_input($_POST['uname']);
			if(isset($_POST['positiontype']))
				$positiontype = test_input($_POST['positiontype']);
			if(isset($_POST['rank']))
				$rank = test_input($_POST['rank']);
			if(isset($_POST['crank']))
				$crank = test_input($_POST['crank']);
			if(isset($_POST['points']))
				$points = test_input($_POST['points']);
			if(isset($_POST['GVP']))
				$GVP = test_input($_POST['GVP']);
			if(isset($_POST['AMAB']))
				$AMAB = test_input($_POST['AMAB']);
			if(isset($_POST['address']))
				$address = test_input($_POST['address']);
			if(isset($_POST['city']))
				$city = test_input($_POST['city']);
			if(isset($_POST['country']))
				$country = test_input($_POST['country']);
			if(isset($_POST['zip']))
				$zip = test_input($_POST['zip']);
			if(isset($_POST['uaddress']))
				$uaddress = test_input($_POST['uaddress']);
			if(isset($_POST['ucity']))
				$ucity = test_input($_POST['ucity']);
			if(isset($_POST['ucountry']))
				$ucountry = test_input($_POST['ucountry']);
			if(isset($_POST['uzip']))
				$uzip = test_input($_POST['uzip']);
			if(isset($_POST['phone']))
				$phone = test_input($_POST['phone']);
			if(isset($_POST['uphone']))
				$uphone = test_input($_POST['uphone']);
			if(isset($_POST['mobile']))
				$mobile = test_input($_POST['mobile']);
			if(isset($_POST['email']))
				$email = test_input($_POST['email']);
			if(isset($_POST['department']))
				$dept_code = test_input($_POST['department']);
			if(isset($_POST['middle']))
				$middle = test_input($_POST['middle']);
			if(isset($_POST['last']))
				$last = test_input($_POST['last']);
			if(isset($_POST['marital_status']))
				$marital_status = test_input($_POST['marital_status']);
			if(isset($_POST['kids']))
				$kids = test_input($_POST['kids']);
			if(isset($_POST['syzygos']))
				$syzygos = test_input($_POST['syzygos']);
			if(isset($_POST['dimotologio_dhmos']))
				$dimos = test_input($_POST['dimotologio_dhmos']);
			if(isset($_POST['dimotologio_nomos']))
				$nomos = test_input($_POST['dimotologio_nomos']);
			if(isset($_POST['dimotologio']))
				$dimotologio = test_input($_POST['dimotologio']);
			if(isset($_POST['mitroo_arenon']))
				$mitroo_arenon = test_input($_POST['mitroo_arenon']);
			if(isset($_POST['mitroo_arenon_nomos']))
				$mitroo_arenon_nomos = test_input($_POST['mitroo_arenon_nomos']);
			if(isset($_POST['mitroo_arenon_dhmos']))
				$mitroo_arenon_dhmos = test_input($_POST['mitroo_arenon_dhmos']);
			if(isset($_POST['id_type']))
				$id_type = test_input($_POST['id_type']);
			if(isset($_POST['id']))
				$id = test_input($_POST['id']);
			if(isset($_POST['id_authority']))
				$id_authority = test_input($_POST['id_authority']);
			if(isset($_POST['id_date']))
				$id_date = test_input($_POST['id_date']);
			if(isset($_POST['fulldob']))
				$full_dob = test_input($_POST['fulldob']);
			if(isset($_POST['birthregion']))
				$birthregion = test_input($_POST['birthregion']);
			if(isset($_POST['birthcity']))
				$birthcity = test_input($_POST['birthcity']);
			if(isset($_POST['religion']))
				$religion = test_input($_POST['religion']);
			if(isset($_POST['nationality']))
				$nationality = test_input($_POST['nationality']);
			if(isset($_POST['region']))
				$region = test_input($_POST['region']);
			if(isset($_POST['uregion']))
				$uregion = test_input($_POST['uregion']);
			if(isset($_POST['studentCode']))
				$studentCode = test_input($_POST['studentCode']);
			if(isset($_POST['sc_apofYear']))
				$sc_apofYear = test_input($_POST['sc_apofYear']);
			if(isset($_POST['sc_arapolit']))
				$sc_arapolit = test_input($_POST['sc_arapolit']);
			if(isset($_POST['sc_apolgrade']))
				$sc_apolgrade = test_input($_POST['sc_apolgrade']);
			if(isset($_POST['sc_diagogi']))
				$sc_diagogi = test_input($_POST['sc_diagogi']);
			if(isset($_POST['milit']))
				$milit = test_input($_POST['milit']);
			if(isset($_POST['progrspoud_ID']))
				$progrspoud_ID = test_input($_POST['progrspoud_ID']);
			if(isset($_POST['in_date']))
				$in_date = test_input($_POST['in_date']); 
			if(isset($_POST['schoolname']))
				$onomasia_sxoleiou = test_input($_POST['schoolname']);
			if(isset($_POST['schooltype']))
				$leitourgia_sxoleiou = test_input($_POST['schooltype']);
			if(isset($_POST['orientation']))
				$kateuthinsi_code = test_input($_POST['orientation']);
			if(isset($_POST['crank']))
				$seira_pritimhshs = test_input($_POST['crank']);
			if(isset($_POST['GVP']))
				$gvp = test_input($_POST['GVP']);
			if(isset($_POST['AMAB']))
				$amav = test_input($_POST['AMAB']);
			if(isset($_POST['schoolcode']))
				$sc_schapof = test_input($_POST['schoolcode']);
			if(isset($_POST['uname']))
				$onomasia_sxolhs = test_input($_POST['uname']);
			if(isset($_POST['ucode']))
				$kodikos_sxolhs = test_input($_POST['ucode']);

			//not insert .....update
			$SQL = c_update($userArray);
			$sql1 = c_update($userExtraArray);
			echo $SQL."<br/>";
			echo $sql1."<br/>";
			echo "Ok mexri edo";
				exit();
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
            $delete_sql = "delete from userinfo where sc_ardeltiou = '".$code."';";
            $delete_sql1 = "delete from useradditionalinfo where `code` = '".$code."';";
			//don't delete update
			mysql_query($delete_sql1) or die(mysql_error());
            mysql_query($delete_sql) or die(mysql_error());
            
            mysql_query($SQL) or die(mysql_error());
            mysql_query($sql1) or die(mysql_error());
            echo "Η ΤΡΟΠΟΠΟΙΗΣΗ ΤΩΝ ΣΤΟΙΧΕΙΩΝ ΣΑΣ ΕΓΙΝΕ ΜΕ ΕΠΙΤΥΧΙΑ!";
        }
        ?>


