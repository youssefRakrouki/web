<?PHP
include "header.php";


?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Vol</a>
            </li>
            <li class="breadcrumb-item active">listes des Reservation</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Liste des reservation</div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>idR</th>
                            <th>cin</th>
                            <th>idVol</th>
                            <th>valid</th>
                            <th>date reservation</th>
                            <th>prix</th>
                            <th>Validation</th>
                            <th>Suppression</th>



                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        include "../../entities/Reservation.php";
                        require '../../core/ReservationC.php';



                        $res=new ReservationC();

                        $liste1=$res->affichReservation();
                        foreach ($liste1 as $emp) {

                            ?>
                            <tr>
                                <td><?php echo $emp['idR']; ?></td>
                                <td><?php echo $emp['cin']; ?></td>
                                <td><?php echo $emp['idVol']; ?></td>

                                <td><?php echo $emp['valid']; ?></td>
                                <td><?php echo $emp['dateReservation']; ?></td>
                                <td><?php echo $emp['prix']; ?></td>
                                <td><a href="modifierReservation.php?idR=<?PHP echo $emp['idR']; ?>">Valider</a></td>
                                <td><a href="supprimerReservation.php?idR=<?PHP echo $emp['idR']; ?>">supprimer</a></td>

                            </tr>

                            <?php
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <?php include 'footer.php' ; ?>

