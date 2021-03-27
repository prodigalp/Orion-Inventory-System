function choice() {
	var pick = document.getElementById("txtGrp");
	if (pick.options.selectedIndex == 1) {
		document.getElementById("txtRol").value = "1";
	} else if (pick.options.selectedIndex == 2) {
		document.getElementById("txtRol").value = "2";
	} else if (pick.options.selectedIndex == 3) {
		document.getElementById("txtRol").value = "2";
	} else if (pick.options.selectedIndex == 4) {
		document.getElementById("txtRol").value = "3";
	} else if (pick.options.selectedIndex == 5) {
		document.getElementById("txtRol").value = "4";
	} else if (pick.options.selectedIndex == 0) {
		document.getElementById("txtRol").value = "";
		alert("Please pick a proper group type");
	}
}

function checkData() {
	$user = document.getElementById("txtUsr").value;
	$pass = document.getElementById("txtPas").value;
	$fnme = document.getElementById("txtFnm").value;
	$mnme = document.getElementById("txtMnm").value;
	$lnme = document.getElementById("txtLnm").value;
	$grup = document.getElementById("txtGrp").value;
	$role = document.getElementById("txtRol").value;
	$pica = document.getElementById("txtFile").value;

	if (
		$user == "" ||
		$pass == "" ||
		$fnme == "" ||
		$mnme == "" ||
		$lnme == "" ||
		$role == "" ||
		$pica == "" ||
		$grup == ""
	) {
		alert("You MUST fill in all the fields");
		return false;
	} else {
		alert("Press OK for verification");
		return true;
	}
}

function checker() {
	$prb = document.getElementById("txtPrb").value;
	$mac = document.getElementById("txtMac").value;
	$dte = document.getElementById("txtDte").value;
	$tme = document.getElementById("txtTme").value;
	$cos = document.getElementById("txtCos").value;
	$dep = document.getElementById("txtDep").value;
	$not = document.getElementById("txtNot").value;
	$req = document.getElementById("txtReq").value;
	$rep = document.getElementById("txtRep").value;
	$fil = document.getElementById("txtFil").value;
	$rem = document.getElementById("txtRem").value;

	if (
		$prb == "" ||
		$mac == "" ||
		$dte == "" ||
		$tme == "" ||
		$cos == "" ||
		$dep == "---" ||
		$not == "" ||
		$req == "" ||
		$rep == "" ||
		$fil == "" ||
		$rem == ""
	) {
		alert("You must fill in all the fields!");
		return false;
	} else {
		alert("Press OK for verification");
		return true;
	}
}

function updater() {
	$upd = document.getElementById("txtGrp2");
	if ($upd.options.selectedIndex == 1) {
		document.getElementById("txtRol2").value = "1";
	} else if ($upd.options.selectedIndex == 2) {
		document.getElementById("txtRol2").value = "2";
	} else if ($upd.options.selectedIndex == 3) {
		document.getElementById("txtRol2").value = "2";
	} else if ($upd.options.selectedIndex == 4) {
		document.getElementById("txtRol2").value = "3";
	} else if ($upd.options.selectedIndex == 5) {
		document.getElementById("txtRol2").value = "4";
	} else if ($upd.options.selectedIndex == 0) {
		document.getElementById("txtRol2").value = "";
		alert("Please pick a proper group type");
	}
}

function validator() {
	var $grouper = document.getElementById("txtGrp2").value;
	if ($grouper == "---") {
		alert("Pick a proper group type");
		return false;
	} else {
		alert("Press OK for verification!");
		return true;
	}
}