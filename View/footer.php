<footer id="pageFooter">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
  <div id="pageFooterContent"><div id=rectangleInterieur><a>Informations<br/>WatcHouse@isep.fr<br/>
  <img id ="imgFooter2" src="" alt="imgFooter2">
  <img id ="imgFooter3" src="" alt="imgFooter3">
</footer>

<script>

     var mnuTimeout = null;
     $('#pageFooter').mouseenter(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '80'}, 250); },400);
     });

     $('#pageFooter').mouseleave(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '20'}, 250); },0);
     });
</script>

</html>
