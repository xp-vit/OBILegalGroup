<html>
<body>
	<label for="count">Add lawyers:</label><br />
	<input type="text" id="count"><br />
	
	<label for="pa_ids">Select lawyers to show:</label><br />
	<select id="pa_ids" multiple>
		<?php 
		$lawyers = json_decode( base64_decode( $_GET['lawyers'] ) );
		if( !empty( $lawyers ) ){
			foreach( $lawyers as $lawyer ){
				?>
				<option value="<?php echo $lawyer; ?>"><?php echo $lawyer; ?></option>
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
				var pa_ids = [];
				var x = 0;
				for (x=0;x<document.getElementById('pa_ids').length;x++){
					if(document.getElementById('pa_ids')[x].selected){
						pa_ids.push( document.getElementById('pa_ids')[x].value )
					}
				}
				pa_ids.join( ',' );
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_lawyers count="'+count+'" pa_ids="'+pa_ids+'"][/lex_lawyers]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 