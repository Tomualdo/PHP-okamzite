<?php
	$mePole = array( 'klic1' => 'hodnota', 'klic2' => 'hodnota2');
	foreach($mePole as $klic => $hodnota) {
		echo $klic . ' - ' . $hodnota;
	}

	$mePole = array( 
		'klic1' => array(
			'uroven1klic1podklic1' => 'hodnota1uroven1podklic1',
			'uroven1klic2podklic1' => 'hodnota2uroven1podklic1'
		),
		 'klic2' => array(
			'uroven1klic1podklic2' => 'hodnota1uroven1podklic2', 
			'uroven1klic2podklic2' => 'hodnota2uroven2podklic2'
		)
	);

	foreach($mePole as $klic => $hodnota){
		foreach($hodnota as $podklic => $podhodnota){
			echo $podklic . ' - ' . $podhodnota;
		}
		echo $klic;
	}