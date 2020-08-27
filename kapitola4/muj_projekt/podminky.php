<?php
	$osloveni = "Petře";

	if ($osloveni == "Petře") {
		echo "Ahoj Petře, jak se dnes máš?";
	}

	if ($osloveni == "Jitko") {
		echo "Ahoj Jitko, jak se dnes máš?";
	} else {
		echo "Ahoj cizinče, jak se máš?";
	}

	$osloveni = "Petře";
	if ($osloveni == "Petře") {
		echo "Ahoj Petře, jak se dnes máš?";
	} elseif ($osloveni == "Jitko") {
		echo "Ahoj Jitko, jak se dnes máš?";
	} else {
		echo "Ahoj cizinče, jak se máš?";
	}