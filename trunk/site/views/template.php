<?php

class templateView
{
	
    function templateAll($title, $code, $data)
	{
	
		require("../includes/header.php");
		require($code); ?>
		</body>
        </html>
    
    <?php
    }
	
}

