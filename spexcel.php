<?php
$status=$_GET['status'];
$company=$_GET['company'];
$date1=$_GET['date1'];
$date2=$_GET['date2'];
session_start(); 
$custid=$_SESSION['id'];
ob_start();
      include('connection.php');
        // include the php-excel class
        require ('class-excel-xml.inc.php');
       $myheaderarray  = array();
	   $myarray = array();
               
               if(!empty($_POST['check_list']))
                {
                    
                     foreach($_POST['check_list'] as $selected)
                    {
                    
                       if(empty($status) && empty($company))
						{
							
										
							$sql = mysql_query("select * from sponser where custid='" . $_SESSION['id'] . "' order by stat desc ");			
						}
						/*if(!empty($status)&& empty($company) &&!empty($date1) && !empty($date2))
						{
						
							$sql="select * from sponser where stat='$status' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'";	
						}*/
						if(empty($status)&& !empty($company)&&!empty($date1) && !empty($date2))
						{
						
							$sql=mysql_query("select * from sponser where company='$company' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'");	
						
						}
						if(!empty($status)&& !empty($company)&&!empty($date1) && !empty($date2))
						{
						
							$sql=mysql_query("select * from sponser where company='$company' and stat='$status' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'");
							
						
						}
						   
						   
                           
                        while($row=mysql_fetch_array($sql))
                        {
                                         $dot=".";
                                         $hyphonnqwe="-";
                                    
                                        $myheaderarray = array();
                                        $myheaderarray [] = array('Company','Year','Month','Amount','Status');
                                        
                                        $myarray[]=array($row['company'],$row['year'],$row['month'],$row['amount'],$row['stat']);
                                         
                                          
                         }
                                    
                    }
                    
                 }
                elseif(empty($_POST['check_list']) || empty($_POST['checkall']))
				{
				 		if(empty($status) && empty($company))
						{
							
										
							$sql = mysql_query("select * from sponser where custid='" . $_SESSION['id'] . "' order by stat desc ");			
						}
						/*if(!empty($status)&& empty($company) &&!empty($date1) && !empty($date2))
						{
						
							$sql="select * from sponser where stat='$status' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'";	
						}*/
						if(empty($status)&& !empty($company)&&!empty($date1) && !empty($date2))
						{
						
							$sql=mysql_query("select * from sponser where company='$company' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'");	
						
						}
						if(!empty($status)&& !empty($company)&&!empty($date1) && !empty($date2))
						{
						
							$sql=mysql_query("select * from sponser where company='$company' and stat='$status' and custid='$custid' and `sponser_date` BETWEEN '$date1' AND '$date2'");
							
						
						}
				 
				        
                        while($row=mysql_fetch_array($sql))
                        {
                                         
                                    
      						$myheaderarray = array();
							$myheaderarray [] = array('Company','Year','Month','Amount','Status');
							
							$myarray[]=array($row['company'],$row['year'],$row['month'],$row['amount'],$row['stat']);
                                         
                      	}
                
				
				
				
				}
                    //style
                    
                     // generate excel file
                                $xls = new Excel_XML;
                                //$xls->getActiveSheet()
                                $xls->addArray($myheaderarray);
                                //foreach ($myarray as $k => $v)
                                //          {
                                //            $this->addRow ($v);
                                //                //endforeach;
                                //          }
                                    $xls->addArray ( $myarray );
                                
                                $xls->generateXML ( "sponsor_lists" );
        
?>