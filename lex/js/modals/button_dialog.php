<html>
<body>
	<label for="text">Input button text:</label><br />
	<input type="text" id="text"><br>

	<label for="link">Input button link:</label><br />
	<input type="text" id="link"><br>
	
	<label for="icon">Select button icon:</label><br />
	<select id="icon">
		<?php
		include( 'fonts.php' );
		$icons = get_icons();
		foreach( $icons as $key => $icon ){
			?>
			<option value="<?php echo $key ?>"><?php echo $icon ?></option>
			<?php
		}
		?>
	</select><br>
	
	<label for="font">Select button font weight:</label><br />
	<select id="font">
		<option value="regular">Regular</option>
		<option value="strong">Strong</option>
	</select><br>
	
	<label for="type">Select button type:</label><br />
	<select id="type">
		<option value="normal">Normal</option>
		<option value="big">Big</option>
	</select><br>
	
	<label for="style">Select button style:</label><br />
	<select id="style">
		<option value="light">Light</option>
		<option value="dark">Dark</option>
	</select><br>
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var text = document.getElementById('text').value;
				var link = document.getElementById('link').value;
				var icon = document.getElementById('icon').value;
				var font = document.getElementById('font').value;
				var type = document.getElementById('type').value;
				var style = document.getElementById('style').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_button text="'+text+'" link="'+link+'" icon="'+icon+'" font="'+font+'" type="'+type+'" style="'+style+'"][/lex_button]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 