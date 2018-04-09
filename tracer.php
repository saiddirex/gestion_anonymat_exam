

 <?php


	 $reqSQL='';

  	function Tracer($reqSQL) 
 
 	{
	
		$login = $_SESSION['username'];

		$today = date("Y-m-d H:i:s");

		
		$IP = $_SERVER['REMOTE_ADDR'];


		$Myfile = fopen("./info.txt", "a" );
	
		fputs($Myfile,$login.'  |  '.$reqSQL.'  |  '.$today.'  |  '.$IP."\r\n");
	
		fclose($Myfile);
 
 	}


?>


