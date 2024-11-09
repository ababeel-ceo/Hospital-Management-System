<?php

session_start();

?> 





<?php
		    
		    unset($_SESSION['us']);
                    session_destroy();
			
		   header('location:../index.php');
                   

                
?>