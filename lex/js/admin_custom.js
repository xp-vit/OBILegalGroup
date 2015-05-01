jQuery(document).ready(function ($) {
	"use strict";
	
	function update_sections(){
		var selected = [];
		$('.lex_sections li').each(function(){
			var $this = $(this);
			if( $this.find('input').prop('checked') ){
				selected.push( $this.find('input').val() );
			}
		});
		
		$('input[name="lex_sections"]').val( selected.join(',') );	
	}
	
	if( $('.lex_sections').length > 0 ){	
		$('.lex_sections').sortable({
			update: function(){
				update_sections();
			}
		});
		
		$('.lex_sections input').change(function(){
			update_sections();
		});
	}
});