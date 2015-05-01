<html>
<body>
	<label for="title">Input Title:</label><br />
	<input type="text" id="title" value="" /><br />
	
	<label for="list_type">Select type:</label><br />
	<select id="list_type" type="text">
		<option value="with_title">With Title</option>
		<option value="list_only">List Only</option>
	</select><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var list_type = document.getElementById('list_type').value;
				var title = document.getElementById('title').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_list text="'+list_type+'" title="'+title+'"][/lex_list]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</head> 