<?php

require_once "PDO.php";

class Doctor extends DB
{
    public function getAllDoctors(){
        $proc = $this->pdo->prepare("SELECT * FROM doctor");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAlldoctorsAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(doctor_code) FROM doctor");
        $proc->execute();
        return $proc->fetch();
    }

    public function getDoctorById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM doctor
                                    WHERE doctor_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getDoctorAmountOfOrders($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE doctor_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function fireDoctor($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM doctor
                                            WHERE doctor_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addDoctor($id, $hospital_id, $name, $last_name, $surname, $post, $phone, $specialization){
        try {
            $proc = $this->pdo->prepare("INSERT INTO doctor (doctor_code, hospital_code, doctor_name, doctor_surname, doctor_last_name, doctor_post, doctor_phone, doctor_specialization) 
                                            VALUES (:doctor_code, :hospital_code, :doctor_name, :doctor_surname, :doctor_last_name, :doctor_post, :doctor_phone, :doctor_specialization); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_post = htmlspecialchars($post);
            $save_phone = htmlspecialchars($phone);
            $save_specialization = htmlspecialchars($specialization);

            $proc->bindValue(":doctor_code" , $id);
            $proc->bindValue(":hospital_code" , $id);
            $proc->bindValue(":doctor_name" , $save_name);
            $proc->bindValue(":doctor_surname" , $save_last_name);
            $proc->bindValue(":doctor_last_name" , $save_surname);
            $proc->bindValue(":doctor_post" , $save_post);
            $proc->bindValue(":doctor_phone" , $save_phone);
            $proc->bindValue(":doctor_specialization" , $save_specialization);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}