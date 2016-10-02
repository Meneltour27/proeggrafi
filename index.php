<?php
	session_start();
	require_once("config.php");
?>
<html>
<head>
<meta charset='utf-8'>
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
        <script src="js/gen_validatorv4.js"></script>
	
	<script>
		  $( function() {
			$( "#id_date" ).datepicker({
				dateFormat : "dd/mm/yy"
			});
			$( "#fulldob" ).datepicker({
				dateFormat : "dd/mm/yy"
			});
			$( "#in_date" ).datepicker({
				dateFormat : "dd/mm/yy"
			});
		  } );
	</script>
	
	        <script>
            function openCity(evt, cityName) {
                // Declare all variables
                
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
</head>
<body>
<table cellspacing="0" cellpadding="0" id="all">
    <tr>
        <td class="header" colspan="2">
        ΣΥΣΤΗΜΑ ΠΡΟΕΓΓΡΑΦΗΣ ΦΟΙΤΗΤΩΝ
        </td>
    </tr>
    <tr>
        <td class="menu">
        <?php
                include_once("menu.php");
        ?>
        </td>
        <td class="content">
        <?php
                if (isset($_GET['action'])){
                    $action = $_GET['action'];
                    if ($action=="register"){
                        include_once("register.php");
                    }
                    else if ($action=="login"){
                        include_once("login.php");
                    }
                    else if ($action=="import"){
                        include_once("import.php");
                    }
                    else if ($action=="search"){
                       
                        include_once("search.php");
                    }
                    else if ($action=="modify"){
                        include_once("modify.php");
                    }
                    else if ($action=="smodify"){
                        include_once("modify_1.php");
                    }
                    else if ($action=="details"){
                        include_once("details.php");
                    }
                    else if ($action=="logout"){
                        include_once("logout.php");
                    }
                }
        ?>
        </td>
    </tr>
    <tr>
        <td class="footer" colspan="2">

        </td>
    </tr>
</table>

</body>
</html>