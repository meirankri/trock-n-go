    <div id="myModal" class="modal">

      <!-- The Close Button -->
      <span class="close">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
  </script>
  <script>

function filtreVille(){
  var selection = $('#ville').val();
  if(selection === "all"){
    $('#content').children().not('#myModal').show();
  } else {
  $('#content').children().not('.'+selection).hide();
  $('.'+selection).show();
 }
}

$('#don').click(function(){
  $('.don').show();
  $('.echange').hide();
})

$('#echange').click(function(){
  $('.echange').show();
  $('.don').hide();
})

$('#all').click(function(){
  $('.echange').show();
  $('.don').show();
})

//affichage div cache
$('.toggleMore').click(function(){
  $(this).next().slideToggle();
});

//reauete ajax recherche

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

//Slider premiere page
$('#slider div:first-child').addClass('active');

//modal page recherche
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");

function zoom(element) {
  modal.style.display = "block";
  modalImg.src = element.src;

}

var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

//Geolocalistion
var x = document.getElementById("latitude");
var y = document.getElementById("longitude");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "La geolocation n'est pas supporté sur votre navigateur, veuillez entrez votre adresse.";
  }
}

function showPosition(position) {
  x.value =  + position.coords.latitude;
  y.value  = position.coords.longitude;
}


</script>
