<html>
<body>
	<label for="count">Add news:</label><br />
	<input type="text" id="count"><br />
	
	<label for="pa_ids">Posts to show:</label><br />
	<select id="pa_ids" multiple>
		<?php $posts = json_decode( base64_decode( $_GET['posts'] ) );
		if( !empty( $posts ) ){
			foreach( $posts as $post ){
				?>
				<option value="<?php echo $post; ?>"><?php echo $post; ?></option>
				<?php
			}
		}
		?>
	</select><br />
	
	<label for="media">Show Media</label><br />
	<select id="media">
		<option value="yes">Yes</option>
		<option value="no">No</option>
	</select><br />
	
	<label for="meta_bar">Show Meta Bar</label><br />
	<select id="meta_bar">
		<option value="yes">Yes</option>
		<option value="no">No</option>
	</select><br />
	
	<label for="post_content">Show Post Content</label><br />
	<select id="post_content">
		<option value="yes">Yes</option>
		<option value="no">No</option>
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
				var media = document.getElementById('media').value;
				var meta_bar = document.getElementById('meta_bar').value;
				var post_content = document.getElementById('post_content').value;
				
				tinymceparent.execCommand( 'mceInsertContent', 0, '[lex_news count="'+count+'" pa_ids="'+pa_ids+'" media="'+media+'" meta_bar="'+meta_bar+'" post_content="'+post_content+'"][/lex_news]' );
				tinymceparent.activeEditor.windowManager.close(window);			
			}, false);
			
			document.getElementById("close").addEventListener("click", function(){
				tinymceparent.activeEditor.windowManager.close(window);
			}, false);
			
		});
	</script>
</body>
</html> 