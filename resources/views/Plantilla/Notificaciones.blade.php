<?php
session_start();
if(
    isset($_SESSION['codigo'])      &&
    isset($_SESSION['msg'])         &&
    $_SESSION['msg']    != null     &&
    $_SESSION['codigo'] != null
  ){

    $Cod = $_SESSION['codigo'];
    switch ($Cod) {
        case 200:
            flashy()->success($_SESSION['msg'], 'exito');
            break;
        case 202:
            flashy()->error($_SESSION['msg'], 'error');
            break;
        case 400:
            flashy()->error($_SESSION['msg'], 'error');
            break;
    }
    $_SESSION['msg'] = null;
    $_SESSION['codigo'] = null;

?>
@include('flashy::message')
<?php
}
?>

