<?PHP
include "../../core/ReservationC.php";
include "../../entities/Reservation.php";

if (isset($_GET['idR'])){
    $resC =new ReservationC();

    $resC->validerReservation($_GET['idR']);

    header('Location: afficherReservation.php');


}

?>


