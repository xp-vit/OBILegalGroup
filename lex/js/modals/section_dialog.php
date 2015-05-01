<html>
<body>
	<label for="button_text">Select section type:</label><br />
	<select id="section_type">
		<option value="light">Light</option>
		<option value="dark">Dark</option>
		<option value="image-background">Background Image</option>
	</select>	<br />
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var section_type = document.getElementById('section_type').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_section class="'+section_type+'"][/lex_section]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</head> 