<html>
<body>
	<label for="el_title">Input counter title:</label><br />
	<input id="el_title" type="text"><br />

	<label for="el_prefx">Input counter prefix:</label><br />
	<input id="el_prefx" type="text"><br />
	
	<label for="el_sufix">Input counter sufix:</label><br />
	<input id="el_sufix" type="text"><br />
	
	<label for="el_counter">Input counter value:</label><br />
	<input id="el_counter" type="text"><br />
	
	<label for="el_counter_delay">Input counter delay:</label><br />
	<input id="el_counter_delay" type="text"><br />
	
	<label for="el_counter_time">Input counter duration:</label><br />
	<input id="el_counter_time" type="text"><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var el_title = document.getElementById('el_title').value;
				var el_prefx = document.getElementById('el_prefx').value;
				var el_sufix = document.getElementById('el_sufix').value;
				var el_counter = document.getElementById('el_counter').value;
				var el_counter_delay = document.getElementById('el_counter_delay').value;
				var el_counter_time = document.getElementById('el_counter_time').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_counter el_title="'+el_title+'" el_prefix="'+el_prefx+'" el_sufix="'+el_sufix+'" el_counter="'+el_counter+'" el_counter_delay="'+el_counter_delay+'" el_counter_time="'+el_counter_time+'"][/lex_counter]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</head> 