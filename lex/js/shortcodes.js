(function() {
    tinymce.create('tinymce.plugins.lex', {
        init : function(ed, url) {	
			ed.addButton('lexgrid', {
				type: 'listbox',
				text: 'Lex Grid',
				icon: false,
				onselect: function(e) {
					var value = this.value();
					if( value !== "" ){
						switch( value ){
							case 'section'  : ed.windowManager.open({
												title  : 'Add Section',
												file   : url + '/modals/section_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											});
											break;
							case 'row'		:ed.execCommand('mceInsertContent', 0, '[lex_row][/lex_row]'); break;
							case 'columns'  : 
								var col = prompt("Column ( 1 - 12 ): ");
								if (col !== "") {
									ed.execCommand('mceInsertContent', 0, '[lex_col md="'+col+'"][/lex_col]');
								}								
					
						}
					}
				},
				values: [
					{ text: 'Section', value: 'section' },
					{ text: 'Row', value: 'row' },
					{ text: 'Columns', value: 'columns' },
				],
				onPostRender: function() {
					ed.my_control = this;
				}
			});
			/* elements */
			ed.addButton('lexelements', {
				type: 'listbox',
				text: 'Lex Elements',
				icon: false,
				onselect: function(e) {
					var value = this.value();
					if( value !== "" ){
						switch( value ){
							case 'button' : ed.windowManager.open({
												title  : 'Add Button',
												file   : url + '/modals/button_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											});break;
							case 'cr' : ed.windowManager.open({
												title  : 'Add Case Results',
												file   : url + '/modals/cr_dialog.php?case_result='+case_result,
												width  : 900,
												height : 600,
												inline : 1
											});break;
							case 'counter' : ed.windowManager.open({
												title  : 'Add Counter',
												file   : url + '/modals/counter_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'divider' : ed.execCommand('mceInsertContent', 0, '[lex_divider][/lex_divider]'); break;
							case 'dropcap' : var letter = prompt("Input dropcap letter: ");
											 if (letter !== "") {
												ed.execCommand('mceInsertContent', 0, '[lex_dropcap el_letter="'+letter+'"][/lex_dropcap]');
											 }
											 break;
							case 'lawyers' : ed.windowManager.open({
												title  : 'Add Lawyers',
												file   : url + '/modals/lawyers_dialog.php?lawyers='+lawyer,
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'list' : ed.windowManager.open({
												title  : 'Add List',
												file   : url + '/modals/list_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'list_item' : ed.windowManager.open({
												title  : 'Add List Item',
												file   : url + '/modals/list_item_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'news' : ed.windowManager.open({
												title  : 'Add News',
												file   : url + '/modals/news_dialog.php?posts='+post,
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'newsletter' : ed.windowManager.open({
												title  : 'Add Newsletter',
												file   : url + '/modals/newsletter_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'pa' : ed.windowManager.open({
												title  : 'Add Practice Areas',
												file   : url + '/modals/pa_dialog.php?practice_areas='+practice_area,
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'testimonials' : ed.windowManager.open({
												title  : 'Add Testimonials',
												file   : url + '/modals/testimonials_dialog.php?testimonials='+testimonial,
												width  : 900,
												height : 600,
												inline : 1
											}); break;
							case 'subheading' : ed.windowManager.open({
												title  : 'Add Subheading',
												file   : url + '/modals/subheading_dialog.php',
												width  : 900,
												height : 600,
												inline : 1
											}); break;
						}
					}
				},
				values: [
					{ text: 'Button', value: 'button' },
					{ text: 'Case Results', value: 'cr' },
					{ text: 'Counter', value: 'counter' },
					{ text: 'Divider', value: 'divider' },
					{ text: 'Dropcap', value: 'dropcap' },
					{ text: 'Lawyers', value: 'lawyers' },
					{ text: 'List', value: 'list' },
					{ text: 'List Item', value: 'list_item' },
					{ text: 'News', value: 'news' },					
					{ text: 'Newsletter', value: 'newsletter' },
					{ text: 'Practice Areas', value: 'pa' },
					{ text: 'Testimonials', value: 'testimonials' },
					{ text: 'Subheading', value: 'subheading' },
				],
				onPostRender: function() {
					ed.my_control = this;
				}
			});			
        }
    });
    // Register plugin
    tinymce.PluginManager.add( 'lex', tinymce.plugins.lex );
})();