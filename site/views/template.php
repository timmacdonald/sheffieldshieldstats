<?php

class templateView
{
	
    function templateAll($title, $code, $data)
	{
	?>
    
		<html>
			<?php require("../includes/header.php"); ?>
			<body>
				<?php require($code); ?>
			</body>
        </html>
    
    <?php
    }
	
}

