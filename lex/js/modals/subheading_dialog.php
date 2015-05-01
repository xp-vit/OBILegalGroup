<html>
<body>
	<label for="heading">Heading:</label><br />
	<select id="heading">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
	</select><br />
	
	<label for="align">Select text alignment:</label><br />
	<select id="align">
		<option value="left">Left</option>
		<option value="center">Center</option>
		<option value="right">Right</option>
	</select><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var heading = document.getElementById('heading').value;
				var align = document.getElementById('align').value;				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_subheading heading="'+heading+'" align="'+align+'"][/lex_subheading]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 