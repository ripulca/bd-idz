<?php

require_once "PDO.php";

class Provider extends DB
{
    public function getAllProviders(){
        $proc = $this->pdo->prepare("SELECT * FROM provider");
        $proc->execute();
        return $proc;
    }

    public function getAllProvidersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(provider_code) FROM provider");
        $proc->execute();
        return $proc;
    }

    public function getProviderById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM provider
                                    WHERE provider_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function getProviderAmountOfMeds($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM provide
                                    WHERE provider_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
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

    public function addProvider($id, $name, $phone, $city, $adderss){
        try {
            $proc = $this->pdo->prepare("INSERT INTO provider (provider_code, provider_name, provider_phone, provider_city, provider_adderss) 
                                            VALUES (:provider_code, :provider_name, :provider_phone, :provider_city, :provider_adderss); ");

            $save_name = htmlspecialchars($name);
            $save_adderss = htmlspecialchars($adderss);
            $save_city = htmlspecialchars($city);
            $save_phone = htmlspecialchars($phone);

            $proc->bindValue(":provider_code" , $id);
            $proc->bindValue(":provider_name" , $save_name);
            $proc->bindValue(":provider_phone" , $save_phone);
            $proc->bindValue(":provider_city" , $save_city);
            $proc->bindValue(":provider_adderss" , $save_adderss);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function updateProvider($id, $name, $phone, $city, $adderss){
        try {
            $proc = $this->pdo->prepare("UPDATE provider
                                            SET provider_name = :provider_name, provider_phone= :provider_phone, provider_city = :provider_city, provider_adderss = :provider_adderss
                                            WHERE provider_code = :provider_code");

            $save_name = htmlspecialchars($name);
            $save_adderss = htmlspecialchars($adderss);
            $save_city = htmlspecialchars($city);
            $save_phone = htmlspecialchars($phone);
                    
            $proc->bindValue(":provider_code" , $id);
            $proc->bindValue(":provider_name" , $save_name);
            $proc->bindValue(":provider_phone" , $save_phone);
            $proc->bindValue(":provider_city" , $save_city);
            $proc->bindValue(":provider_adderss" , $save_adderss);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка обновления: " . $e->getMessage();
            return false;
        }
        return true;
    }
}