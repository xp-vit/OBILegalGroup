<html>
<body>
	<label for="button_text">Input text:</label><br />
	<input id="text" type="text"><br />
	
	<label for="button_text">Input link:</label><br />
	<input id="link" type="link"><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var text = document.getElementById('text').value;
				var link = document.getElementById('link').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_list_item text="'+text+'" link="'+link+'"][/lex_list_item]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</head> 