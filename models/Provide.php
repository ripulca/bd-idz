<?php

require_once "PDO.php";

class Provide extends DB
{
    public function getAllProvide(){
        $proc = $this->pdo->prepare("SELECT * FROM provider");
        $proc->execute();
        return $proc;
    }

    public function getProvideByProviderId($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM provide
                                    WHERE provider_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function getProvideByMedicineId($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM provide
                                    WHERE medicine_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function fireProvideByProviderId($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM provide
                                            WHERE provider_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function fireProvideByMedicineId($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM provide
                                            WHERE medicine_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addProvide($id, $meds_id, $amount){
        try {
            $proc = $this->pdo->prepare("INSERT INTO provide (provider_code, medicine_code, how_much_in_stock) 
                                            VALUES (:provider_code, :medicine_code, :how_much_in_stock); ");

            $proc->bindValue(":provider_code" , $id);
            $proc->bindValue(":medicine_code" , $meds_id);
            $proc->bindValue(":how_much_in_stock" , $amount);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}