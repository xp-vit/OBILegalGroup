jQuery(document).ready(function($) {
   //var height = $(window).height();
   //$('#below').css('height',height);
   $.ajax({
     url:"/wp-admin/admin-ajax.php",
     type:'POST',
     data:'action=get_home_text&blah=1',
     success:function(results){
        var obj = results;
        var txt = obj.match(/[^\r\n]+/g);
        var arrSize = txt.length;
        var mod = txt.length + 2;
        var dub = arrSize * 2;
        count = 0;
        var cyc = function cycle() {
   	   var pos = count % mod;
   	   count++;
   	   if(count == arrSize + 2){
   	      count = 0;
   	   }
           if(pos < arrSize){
              $('#below').append('<h1 style="display:none;"><span class="rotate">' + txt[pos] + '</span></h1>');
              $('#below h1').last().fadeIn('slow');
           } else if(pos == arrSize + 1){
      	      $('#below').children().fadeOut('slow', function(){
      	         $(this).remove();
      	      });
           }
        }
        setInterval(cyc,2000);
     }
   });

});

