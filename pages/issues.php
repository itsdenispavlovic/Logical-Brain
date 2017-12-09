<?php
include('header.inc.php');
if($admin->loggedin())
{
  header("Location: admin.php");
}

$title = @$_POST['title'];
$description = @$_POST['description'];
$location = @$_POST['location'];
//Locatie trebuie modificata...

if(isset($_POST['send']))
{
  $state = $conn->prepare("INSERT INTO issues (author, title, short_d, physical_location) VALUES (:author, :title, :description, :location)");
  $state->execute(array(
    ':author' => $author,
    ':title' => $title,
    ':description' => $description,
    ':location' => $location
  ));
  echo "<script>alert('You're Issue is now Reported!);</script>";
}

?>

<style>
      #map {
        height: 400px;
        width: 100%;
       }
</style>
<form class="form-signin" action="issues.php" method="POST">
  <h2 class="center">Report an issue:</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" id="" placeholder="Enter firstname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Short Description</label>
    <textarea onkeydown="keydown()" type="text" name="description" class="form-control" id="sss" maxlength="250" placeholder="Write a short description" required></textarea>
    <div id="textarea_feedback"></div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" name="location" class="form-control" id="location" onload="getLocation()" value="" readonly>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEKmsFXpN8i8nyuB9nNgQ6THsdTUjqxn0&callback=initMap">
    </script>
    </div>
  <button type="submit" name="send" onclick="checkLenght()" class="btn btn-primary">Send</button>
</form>

<script>
var y = document.getElementById("sss");

function checkLenght() {
  if(y.value.length <= 250 && y.value.length >= 10) {
    alert('Success! You'/'re Issue is now Reported');
  }
  else
  {
    alert('Minimum length is 10 Characters');
  }
}

var area = document.getElementById("sss");
var message = document.getElementById("textarea_feedback");
var maxLength = 250;
var checkLength = function() {
    if(area.value.length < maxLength) {
        message.innerHTML = (maxLength-area.value.length) + " characters remainging";
    }
}
setInterval(checkLength, 300);
</script>

<?php
include('footer.inc.php');
?>
