<?php
	function f_fecha($fecha){
		$fechas = explode("-", $fecha);
			@$dia=$fechas[2];
			@$mes=$fechas[1];
			switch($mes){
				case 1: $mes_1='Ene'; break;
				case 2: $mes_1='Feb'; break;
				case 3: $mes_1='Mar'; break;
				case 4: $mes_1='Abr'; break;
				case 5: $mes_1='May'; break;
				case 6: $mes_1='Jun'; break;
				case 7: $mes_1='Jul'; break;
				case 8: $mes_1='Ago'; break;
				case 9: $mes_1='Sept'; break;
				case 10: $mes_1='Oct'; break;
				case 11: $mes_1='Nov'; break;
				case 12: $mes_1='Dic'; break;
			}
			@$ano=$fechas[0];
			return @$fecha=$dia.' - '.$mes_1.' - '.$ano;	
	}
	
	function f_horario($horario){
		$horarios = explode(":", $horario);
			@$hora=$horarios[0];
			@$minuto=$horarios[1];
			@$segundos=$horarios[2];
			switch($hora){
				case '06': $hr='6'; $tipo='am'; break;
				case '07': $hr='7'; $tipo='am'; break;
				case '08': $hr='8'; $tipo='am'; break;
				case '09': $hr='9'; $tipo='am'; break;
				case '10': $hr='10'; $tipo='am'; break;
				case '12': $hr='12'; $tipo='pm'; break;
				case '13': $hr='1'; $tipo='pm'; break;
				case '14': $hr='2'; $tipo='pm'; break;
				case '15': $hr='3'; $tipo='pm'; break;
				case '16': $hr='4'; $tipo='pm'; break;
				case '17': $hr='5'; $tipo='pm'; break;
				case '18': $hr='6'; $tipo='pm'; break;
				case '19': $hr='7'; $tipo='pm'; break;
				case '20': $hr='8'; $tipo='pm'; break;
				case '21': $hr='9'; $tipo='pm'; break;
				case '21': $hr='10'; $tipo='pm'; break;
				case '23': $hr='11'; $tipo='pm'; break;
			}
			
			return @$hora=$hr.':'.$minuto.' '.$tipo;	
	}
?>