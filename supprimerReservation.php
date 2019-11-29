<?php
include "../../entities/Reservation.php";
include "../../core/ReservationC.php";
if (isset($_GET['idR']))
{

    $valeur=$_GET['idR'];

    $pe = new ReservationC();
    $pe->supprimerReservation($valeur);
    header('Location: afficherReservation.php');
}
?>
