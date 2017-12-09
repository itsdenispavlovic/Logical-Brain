<?php
include('header.inc.php');
if(!$us->loggedin())
{
  $us->redirect('login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $conn->prepare('SELECT * FROM users WHERE id=:user_id');
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>



<?php
include('footer.inc.php');
?>
