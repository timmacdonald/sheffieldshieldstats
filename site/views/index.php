<?php

?>
	<div class='main'>
		<p class='heading_1'>Welcome to Sheffield Shield Cricket Stats</p>
		<p class='bodycontent'>
			The interactive database which allows you to dynamically search 
			individuals performances through Sheffield Shield history.
		</p>
		<p class='bodycontent'>
			<form name='search' action='search' method='post' accept-charset='utf-8'>
				<input type='hidden' name='wordLimit' value='1' />
				Search Players: 
				<input type='text' name='search' size='30'/>
				<input type='submit' value='Search' />
			</form>
		</p>
		<?php	
			foreach ($data['seasons'] as $seasons)
			{
				if ($seasons['season_start'] === $seasons['season_end'])
					echo "<a href='seasons/" . $seasons['id'] . "'>" . $seasons['season_start'] . "</a><br/>";
				else
					echo "<a href='seasons/" . $seasons['id'] . "'>" . $seasons['season_start'] . "/" . $seasons['season_end'] . "</a><br/>";
			} 
		?>
	</div>
		
<?php
    