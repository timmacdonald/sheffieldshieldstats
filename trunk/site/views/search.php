<?php

?>
	<div class="main">
		<p class="heading_1">Search Player</p>
		<p>
		<?php echo "Search Results for: <span class='heading_2'>" . stripslashes($data['test']) . "</span><br />"; ?>
		</p>
		<p>
			<?php
				if (!empty($data['searchReturn']))
				{
					foreach ($data['searchReturn'] as $results)
						echo "<a href='players/" . $results['id'] . "'>" . $results['first_name'] . " " . $results['middle_names'] . " " . $results['surname'] . "</a><br/>";
				}
				else
					echo "No players found";
			?>	
		</p>
	</div>
			
<?php

