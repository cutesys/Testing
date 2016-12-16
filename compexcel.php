<?php

$search=$_GET['id'];

session_start(); 
ob_start();
      include('connection.php');
        // include the php-excel class
        require ('class-excel-xml.inc.php');
       
             
                if(!empty($_POST['check_list']))
                {
				
                    
                     foreach($_POST['check_list'] as $selected)
                    {
                      $custid=$_SESSION['id']; 
					  
					  if($search == '')
							{
							
								$sql="SELECT * FROM `add_commpany` where custid ='$custid' and status='1'";
							}
							else
							{
							
					  	
                       			/*$sql = "SELECT * FROM `add_company` where custid= '$custid' and status = '1' and address1  like '%$search%' or email like '%$search%' or  CRexdate  like '%$search%' or address2 like '%$search%' or compid like '%$search%'";*/
								$sql = "SELECT * FROM `add_company` where custid= '$custid' and status = '1' and compid like '%$search%'";
								
							}	
					  
					  
					  $res=mysql_query($sql);
                      while($row=mysql_fetch_array($res))
                      {
						 $dot=".";
						 $hyphonnqwe="-";
					
						 $myheaderarray = array();
						 $myheaderarray [] = array('Company Id','Name','Address','Address2','Email','CRexpiry','Status');
															
                         $myarray[]=array($row['compid'],$row['compname'],$row['address1'],$row['address2'],$row['email'],$row['CRexdate'],$row['stat']);
                                         
                                          
                      }
                                    
                    }
                    
                
                }
                else if(empty($_POST['check_list']) || empty($_POST['checkall']))
                {
                       $custid=$_SESSION['id'];
					   
					   if($search == '')
							{
							
								$sql="SELECT * FROM `add_company` where custid ='$custid' and status ='1'";
							}
							else
							{
							  /*$sql = "SELECT * FROM `add_company` where custid= '$custid' and status = '1' and address1  like '%$search%' or email like '%$search%' or  CRexdate  like '%$search%' or address2 like '%$search%' or compid like '%$search%'";*/
								$sql = "SELECT * FROM `add_company` where custid= '$custid' and status = '1' and compid like '%$search%'";
                        	}
						    $res=mysql_query($sql);
                            while($row=mysql_fetch_array($res))
                                    {
                                         
                                    
                                        $myheaderarray = array();
                                       $myheaderarray [] = array('Company Id','Name','Address','Address2','Email','CRexpiry','Status');
              $myarray[]=array($row['compid'],$row['compname'],$row['address1'],$row['address2'],$row['email'],$row['CRexdate'],$row['stat']);
                                         
                                          
                                    }
                
                }
                
                
         
                   //style
                    
                      // generate excel file
                                $xls = new Excel_XML;
                                //$xls->getActiveSheet()
                                $xls->addArray ( $myheaderarray );
                                //foreach ($myarray as $k => $v)
                                //          {
                                //            $this->addRow ($v);
                                //                //endforeach;
                                //          }
                                    $xls->addArray ( $myarray );
                                
                                $xls->generateXML ( "company_lists" );
        
?>