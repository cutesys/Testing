<?php
$search=$_GET['id'];
session_start(); 
ob_start();
$custid=$_SESSION['id'];

      include('connection.php');
        // include the php-excel class
        require ('class-excel-xml.inc.php');
       $myheaderarray  = array();
	   $myarray = array();
               
                if(!empty($_POST['check_list']))
                {
                    
                     foreach($_POST['check_list'] as $selected)
                    {
                    	if($search == '')
						{
						
							 
						    $sql="SELECT * FROM partner WHERE custid='" . $_SESSION['id'] . "' AND status='1'";
						
						
						}		
						else
						{	
							
                            /*$sql= "SELECT * FROM `partner` where custid= '$custid' and status='1' and parname  like '%$search%' or compname like '%$search%' or  parid  like '%$search%' and email like '%$search%' or phone like '%$search%'";*/
							$sql= "SELECT * FROM `partner` where custid= '$custid' and status='1' and parid  like '%$search%'";
						}	
                        $res=mysql_query($sql);
                        while($row=mysql_fetch_array($res))
                        {
                            $dot=".";
                            $hyphonnqwe="-";
                                    
                            $myheaderarray = array();
                            $myheaderarray [] = array('Qatarid','Company','Name','Email','Phone');
                                        
                            $myarray[]=array($row['parid'],$row['compname'],$row['parname'],$row['email'],$row['phone']);
                                         
                                          
                        }
									
						  			
                                    
                    }
                    
                 }
                elseif(empty($_POST['check_list']) || empty($_POST['checkall']))
				{
                        if($search == '')
						{
						
							 
						    $sql="SELECT * FROM partner WHERE custid='$custid' AND status='1'";
						
						
						}		
						else
						{	
							
                            /*$sql= "SELECT * FROM `partner` where custid= '$custid' and status='1' and parname  like '%$search%' or compname like '%$search%' or  parid  like '%$search%' and email like '%$search%' or phone like '%$search%'";*/
							$sql= "SELECT * FROM `partner` where custid= '$custid' and status='1' and parid  like '%$search%'";
						}
															
                         $res=mysql_query($sql);
                         while($row=mysql_fetch_array($res))
                         {
                                         
                                    
                                       $myheaderarray  = array();
                                     $myheaderarray [] = array('Qatarid','Company','Name','Email','Phone');
                                        
                                        $myarray[]=array($row['parid'],$row['company'],$row['parname'],$row['email'],$row['phone']);
                                          
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
                                
                                $xls->generateXML ( "partner_lists" );
        
?>