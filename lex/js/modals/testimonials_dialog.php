<html>
<body>
	<label for="el_title">Testimonials Title</label>
	<input type="text" id="el_title"><br />
	
	<label for="count">Add testimonials:</label><br />
	<input type="text" id="count"><br />
	
	<label for="pa_ids">Select testimonials to show:</label><br />
	<select id="pa_ids" multiple>
		<?php 
		$testimonials = json_decode( base64_decode( $_GET['testimonials'] ) );
		if( !empty( $testimonials ) ){
			foreach( $testimonials as $testimonial ){
				?>
				<option value="<?php echo $testimonial; ?>"><?php echo $testimonial; ?></option>
				<?php
			}
		}
		?>
	</select><br />
	
	<label for="icon">Select icon:</label><br />
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
	
	<input type="button" id="save" value="Save">
	<input type="button" id="close" value="Close">
	<script type="text/javascript">	
		var tinymceparent = parent.tinyMCE;
		window.addEventListener('DOMContentLoaded', function () {
			document.getElementById("save").addEventListener("click", function(){
				var el_title = document.getElementById('el_title').value;
				var count = document.getElementById('count').value;
				var icon = document.getElementById('icon').value;

				var pa_ids = [];
				var x = 0;
				for (x=0;x<document.getElementById('pa_ids').length;x++){
					if(document.getElementById('pa_ids')[x].selected){
						pa_ids.push( document.getElementById('pa_ids')[x].value )
					}
				}
				pa_ids.join( ',' );
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_testimonials el_title="'+el_title+'" count="'+count+'" pa_ids="'+pa_ids+'"][/lex_testimonials]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 