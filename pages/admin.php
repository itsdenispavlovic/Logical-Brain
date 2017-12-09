<?php
//Header
include('header.admin.inc.php');


?>
<!--Content-->
<div class="row center">
  <div class="col-sm-4">
    Solved Issues<br />(x)
  </div>
  <div class="col-sm-4">
    Total Users<br />(<?php $sql = "SELECT count(*) FROM users WHERE approved = 1";
$result = $conn->prepare($sql);
$result->execute();
echo $number_of_rows = $result->fetchColumn();  ?>)
<br />
<br />
<a href="view_all.php" class="btn btn-primary">View all the users</a>
  </div>
  <div class="col-sm-4">
    Archived Issues<br />(x)
  </div>
</div>
<div class="row pp center">
  <div class="tt col-sm-4">
    <h3>Pending Users</h3>
    <hr />
    <div class="p_users">
      <?php
      $users = 'SELECT * FROM users WHERE admin=0 AND approved=0';
      foreach ($conn->query($users) as $us) {
        $fn = $us['firstname'];
        $ln = $us['lastname'];
        echo '
        <div class="card mb-4">
            <div class="card-body">
              <h4 class="card-title">' . $fn . " " . $ln .'</h4>
              <a href="view.php" class="btn btn-primary">View</a> <a href="#" class="btn btn-primary">Make a admin</a> <a href="#" class="btn btn-primary">Permiss</a>
            </div>
          </div>
        ';
        echo "<br />";
        echo "<hr />";
      }
      ?>
    </div>
  </div>
  <div class="tt col-sm-4">
    <h3>Comments</h3>
    <hr />
    <div class="p_comments">
      <p>Lorem ipsmun nasodnasodinasodasndoasdnasdaasdasdasdasddnda</p>
      <a href="!#">Like</a>(x)<a href="!#">Dislike</a>(y)
      <br />
      <br />
      <p>Lorem ipsmun nasodnasodinasodasndoasdnasdaasdasdasdasddnda</p>
      <a href="!#">Like</a>(x)<a href="!#">Dislike</a>(y)
      <br />
      <br />
      <p>Lorem ipsmun nasodnasodinasodasndoasdnasdaasdasdasdasddnda</p>
      <a href="!#">Like</a>(x)<a href="!#">Dislike</a>(y)
    </div>
  </div>
  <div class="tt col-sm-4">
    <h3>New Issues</h3>
    <hr />
  </div>
</div>
<?php
//Footer
include('footer.admin.inc.php');
?>
