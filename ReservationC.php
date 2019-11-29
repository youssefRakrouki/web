<?php

include"entities/Vol.php";
class ReservationC
{
    protected $db;
    function __construct() {

        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
    }
    function affichReservation(){
        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        $sql="SElECT * From reservationVol";
        try{
            $liste=$this->db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function recupererReservation($idR){

        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $sql="SELECT * from reservationVol where idR=$idR";
        $this->db = $conn;
        try{
            $liste=$this->db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function validerReservation($idR){

            $conn = NULL;
            try{
                $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                    "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }
            $this->db = $conn;
        $sql="UPDATE reservationVol SET valid=1 WHERE idR='$idR'";

        $req= $this->db->prepare($sql);
            $req->bindValue(':idR',$idR);
            $req->execute();

        }


    public function ajouterReservationVol($cin,$idVol,$valid,$dateReservation,$prix)
    {
        date_default_timezone_set("Africa/Tunisie");
        echo "The time is " . date("h:i:sa");


        $conn = NULL;
        try{

            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        echo $idVol ;

        $sql = "INSERT INTO reservationVol (cin,idVol,valid,dateReservation,prix) VALUES ('$cin','$idVol','$valid',now(),'$prix')";


        $this->db->exec($sql);
        echo "The time is ";
    }





    public function supprimerReservation($idR)
    {

        $conn = NULL;
        try{
            $conn = new PDO("mysql:host=localhost;dbname=agence_de_voyage",
                "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        }
        $this->db = $conn;
        $sql = "DELETE  FROM `reservationVol` WHERE `idR`=:idR";
        $req= $this->db->prepare($sql);
        $req->bindValue(':idR',$idR);
        $req->execute();

    }













}