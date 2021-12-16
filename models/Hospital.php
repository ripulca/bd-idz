<?php

require_once "PDO.php";

class Hospital extends DB
{
    public function getAllHospitals(){
        $proc = $this->pdo->prepare("SELECT * FROM hospital");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllHospitalsAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(hospital_code) FROM hospital");
        $proc->execute();
        return $proc->fetch();
    }

    public function getHospitalById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM hospital
                                    WHERE hospital_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getHospitalAmountOfDoctors($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM doctor
                                    WHERE hospital_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function fireHospital($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM hospital
                                            WHERE hospital_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addHospital($id, $name, $address, $city){
        try {
            $proc = $this->pdo->prepare("INSERT INTO hospital (hospital_code, hospital_name, hospital_address, hospital_city) 
                                            VALUES (:hospital_code, :hospital_name, :hospital_address, :hospital_city); ");

            $save_name = htmlspecialchars($name);
            $save_address = htmlspecialchars($address);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":hospital_code" , $id);
            $proc->bindValue(":hospital_name" , $save_name);
            $proc->bindValue(":hospital_address" , $save_address);
            $proc->bindValue(":hospital_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}