
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <script>
      $('.toggleMore').click(function(){
        $(this).next().slideToggle();
      });

var xmlhttp = new XMLHttpRequest();
function showResult(word){
  $('#content').html('<img src="img/ajax-loader.gif">');
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        $('#content').html(this.responseText);
        $('#recherche').val('');
      }
    };
xmlhttp.open("GET", "research_ajax.php?recherche="+word,true);
xmlhttp.send();
}

$('#search').click(function(){
  var searchTerm = $('#recherche').val();
  showResult(searchTerm);
})


    </script>
  </body>

</html>
