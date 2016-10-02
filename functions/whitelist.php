<?php function whitelist($arrayTested){
	$whitelistedWords = array("sc_ardeltiou"=>true,"arxika"=>true,
	"last"=>true,"first"=>true,"department_ID"=>true,"middle"=>true,
	"fname"=>true,"fname_gen"=>true,"mname"=>true,"mname_gen"=>true,
	"mlast"=>true,"sex"=>true,"maritalstatusID"=>true,"syzname"=>true,
	"childs_num"=>true,"dimotologio"=>true,"dimotologio_topos"=>true,
	"dimotologioregion"=>true,"mitroo_num"=>true,"mitroo_topos"=>true,
	"mitrooregion"=>true,"IDtype"=>true,"IDnum"=>true,"IDdate"=>true,
	"IDarxi"=>true,"birthdate"=>true,"birthregion"=>true,"placeofbirth"=>true,
	"religionID"=>true,"nationalityID"=>true,"haddress"=>true,"hzip"=>true,
	"hcity"=>true,"hcountry"=>true,"hphone"=>true,"hregion"=>true,"uaddress"=>true,
	"uzip"=>true,"ucity"=>true,"ucountry"=>true,"uphone"=>true,"uregion"=>true,
	"email"=>true,"mobilephone"=>true,"studentCode"=>true,"sc_schapof"=>true,
	"sc_apofYear"=>true,"sc_arapolit"=>true,"sc_apolgrade"=>true,"sc_diagogi"=>true,
	"sc_arseiras"=>true,"in_date"=>true,"in_points"=>true,"in_year"=>true,
	"in_modeID"=>true,"milit"=>true,"progrspoud_ID"=>true,"catID"=>true,
	"in_exam_ID"=>true,"in_period_ID"=>true,"school_name"=>true,"school_type"=>true,
	"orientation"=>true,"pref"=>true,"school_code"=>true,"sc_name"=>true,
	"sc_code"=>true,"amav","gvp"=>true);
	foreach($arrayTested as $key=>$value){
		if(!isset($whitelistedWords[$key])){
			unset($arrayTested[$key]);
		}
	}
	return $arrayTested;
}
$arrayT = array("1"=>1,"2"=>1,"sc_code"=>1,"4"=>1,"hcity"=>1);
$arrayT = whitelist($arrayT);
print_r($arrayT);
?>