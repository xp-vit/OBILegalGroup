<html>
<body>
	<label for="text">Input subscription text:</label><br />
	<input id="text" type="text"><br />
	
	<label for="placeholder">Input subscription placeholder:</label><br />
	<input id="placeholder" type="text"><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var text = document.getElementById('text').value;
				var placeholder = document.getElementById('placeholder').value;

				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_newsletter text="'+text+'" placeholder="'+placeholder+'"][/lex_newsletter]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</head> 