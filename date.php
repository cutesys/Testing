 $originalDate1                = explode("-",$type_list[0]['date_from']);
        $date_from      = $originalDate1[2]."-".$originalDate1[1]."-".$originalDate1[0];
			$values['date_from']= $date_from;
		$originalDate2                = explode("-",$type_list[0]['date_to']);
           $date_to      = $originalDate2[2]."-".$originalDate2[1]."-".$originalDate2[0];
		 $values['date_to']= $date_to ;