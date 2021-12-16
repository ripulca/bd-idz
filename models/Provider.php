<?php

require_once "PDO.php";

class Provider extends DB
{
    public function getAllProviders(){
        $proc = $this->pdo->prepare("SELECT * FROM provider");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProvidersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(provider_code) FROM provider");
        $proc->execute();
        return $proc->fetch();
    }

    public function getProviderById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM provider
                                    WHERE provider_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getProviderAmountOfMeds($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE provider_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function fireProvider($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM provider
                                            WHERE provider_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addProvider($id, $name, $last_name, $surname, $city){
        try {
            $proc = $this->pdo->prepare("INSERT INTO provider (provider_code, provider_name, provider_surname, provider_last_name, provider_city) 
                                            VALUES (:provider_code, :provider_name, :provider_surname, :provider_last_name, :provider_city); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":provider_code" , $id);
            $proc->bindValue(":provider_name" , $save_name);
            $proc->bindValue(":provider_surname" , $save_last_name);
            $proc->bindValue(":provider_last_name" , $save_surname);
            $proc->bindValue(":provider_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}