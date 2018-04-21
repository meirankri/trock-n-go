
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


      $(function() {
        $('#search').click(function() {
          $('#content').html('');
          $('#content').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">');
          var search = $('#recherche').val();
          $.ajax({
           type: 'GET',
           url: 'research_ajax.php',
           data: 'recherche=' + search,
           dataType: 'html',
           success: function(data) {
             $('#content').html(data); },
           error: function() {
              }
         });
        });
      });





    </script>
  </body>

</html>
