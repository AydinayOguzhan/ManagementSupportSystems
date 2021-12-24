<?php
class ClinicDal
{

    function __construct()
    {
        require_once("/wamp64/www/kds/Business/Constants.php");
    }

    function GetAllClinics()
    {
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {
            $query = mysqli_query($kdsCon, "SELECT * from clinics ");
            if (mysqli_num_rows($query) > 0) {
                $clinics = array();
                while ($row = mysqli_fetch_assoc($query)) {
                    $clinics[] = $row;
                }
                mysqli_close($kdsCon);
                return $clinics;
            } else {
                $uclinicssers = array();
                return $clinics;
            }
        } else {
            $clinics = array();
            return $clinics;
        }
    }

    function Add($clinicName)
    {
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {       
            $query = mysqli_query($kdsCon, "INSERT INTO `clinics`(`clinic_name`) VALUES ('".$clinicName."')");
            return $query;
        } else {
            return Constants::$connectionError;
        }
    }

    function Delete($clinicId)
    {
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {       
            $query = mysqli_query($kdsCon, "DELETE FROM `clinics` WHERE id= '".$clinicId."' ");
            return $query;
        } else {
            return Constants::$connectionError;
        }
    }


    function AddDoctorClinic($doctorId, $clinicId){
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {       
            $query = mysqli_query($kdsCon, "INSERT INTO `doctorworkplaces`(`doctor_id`, `clinic_id`) 
            VALUES ('".$doctorId."' ,'".$clinicId."')");
            return $query;
        } else {
            return Constants::$connectionError;
        }
    }

    function DeleteDoctorClinic($doctorId){
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {       
            $query = mysqli_query($kdsCon, "DELETE FROM doctorworkplaces where doctor_id = '".$doctorId."' ");
            return $query;
        } else {
            return Constants::$connectionError;
        }
    }

    function UpdateDoctorClinic($doctorId, $clinicId){
        require("/wamp64/www/kds/DataAccess/connection/connection.php");
        if ($kdsCon) {       
            $query = mysqli_query($kdsCon, "UPDATE `doctorworkplaces` set clinic_id = '".$clinicId."'
            where doctor_id = '".$doctorId."' ");
            return $query;
        } else {
            return Constants::$connectionError;
        }
    }


}
