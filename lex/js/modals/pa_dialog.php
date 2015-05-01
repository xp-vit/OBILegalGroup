<html>
<body>
	<label for="count">Add practice areas:</label><br />
	<input type="text" id="count"><br />
	
	<label for="columns">Columns:</label><br />
	<select id="columns">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select><br />
	
	<label for="pa_ids">Select practice areas to display:</label><br />
	<select id="pa_ids" multiple>
		<?php 
		$practice_areas = json_decode( base64_decode( $_GET['practice_areas'] ) );
		if( !empty( $practice_areas ) ){
			foreach( $practice_areas as $practice_area ){
				?>
				<option value="<?php echo $practice_area; ?>"><?php echo $practice_area; ?></option>
				<?php
			}
		}
		?>
	</select><br />
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var count = document.getElementById('count').value;
				var columns = document.getElementById('columns').value;
				var pa_ids = [];
				var x = 0;
				for (x=0;x<document.getElementById('pa_ids').length;x++){
					if(document.getElementById('pa_ids')[x].selected){
						pa_ids.push( document.getElementById('pa_ids')[x].value )
					}
				}
				pa_ids.join( ',' );
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_pa count="'+count+'" columns="'+columns+'" pa_ids="'+pa_ids+'"][/lex_pa]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 