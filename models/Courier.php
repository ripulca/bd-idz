<?php

require_once "PDO.php";

class Courier extends DB
{
    public function getAllCouriers(){
        $proc = $this->pdo->prepare("SELECT * FROM courier");
        $proc->execute();
        return $proc;
    }

    public function getAllCouriersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(courier_code) FROM courier");
        $proc->execute();
        return $proc;
    }

    public function getCourierById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM courier
                                    WHERE courier_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function getCourierAmountOfOrders($id){
        $proc = $this->pdo->prepare('SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE courier_code=?; ');

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function fireCourier($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM courier
                                            WHERE courier_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addCourier($id, $name, $last_name, $surname, $city){
        try {
            $proc = $this->pdo->prepare("INSERT INTO courier (courier_code, courier_name, courier_surname, courier_last_name, courier_city) 
                                            VALUES (:courier_code, :courier_name, :courier_surname, :courier_last_name, :courier_city); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":courier_code" , $id);
            $proc->bindValue(":courier_name" , $save_name);
            $proc->bindValue(":courier_surname" , $save_last_name);
            $proc->bindValue(":courier_last_name" , $save_surname);
            $proc->bindValue(":courier_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function updateCourier($id, $name, $last_name, $surname, $city){
        try {
            $proc = $this->pdo->prepare("UPDATE courier
                                            SET courier_name = :courier_name, courier_surname= :courier_surname, courier_last_name = :courier_last_name, courier_city = :courier_city
                                            WHERE courier_code = :courier_code");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":courier_code" , $id);
            $proc->bindValue(":courier_name" , $save_name);
            $proc->bindValue(":courier_surname" , $save_last_name);
            $proc->bindValue(":courier_last_name" , $save_surname);
            $proc->bindValue(":courier_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка обновления: " . $e->getMessage();
            return false;
        }
        return true;
    }
}