<?php

require_once "PDO.php";

class Customer extends DB
{
    public function getAllCustomers(){
        $proc = $this->pdo->prepare("SELECT * FROM customer");
        $proc->execute();
        return $proc;
    }

    public function getAllCustomersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(customer_code) FROM customer");
        $proc->execute();
        return $proc();
    }

    public function getCustomerById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM customer
                                    WHERE customer_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function getCustomerAmountOfOrders($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE customer_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function fireCustomer($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM customer
                                            WHERE customer_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addCustomer($id, $name, $last_name, $surname, $city, $phone){
        try {
            $proc = $this->pdo->prepare("INSERT INTO customer (customer_code, customer_name, customer_surname, customer_last_name, customer_city, customer_phone) 
                                            VALUES (:customer_code, :customer_name, :customer_surname, :customer_last_name, :customer_city, :customer_phone); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);
            $save_phone = htmlspecialchars($phone);

            $proc->bindValue(":customer_code" , $id);
            $proc->bindValue(":customer_name" , $save_name);
            $proc->bindValue(":customer_surname" , $save_last_name);
            $proc->bindValue(":customer_last_name" , $save_surname);
            $proc->bindValue(":customer_city" , $save_city);
            $proc->bindValue(":customer_phone" , $save_phone);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function updateCustomer($id, $name, $last_name, $surname, $city, $phone){
        try {
            $proc = $this->pdo->prepare("UPDATE customer
                                            SET customer_name = :customer_name, customer_surname= :customer_surname, customer_last_name = :customer_last_name, customer_city = :customer_city, customer_phone = :customer_phone
                                            WHERE customer_code = :customer_code");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);
            $save_phone = htmlspecialchars($phone);

            $proc->bindValue(":customer_code" , $id);
            $proc->bindValue(":customer_name" , $save_name);
            $proc->bindValue(":customer_surname" , $save_last_name);
            $proc->bindValue(":customer_last_name" , $save_surname);
            $proc->bindValue(":customer_city" , $save_city);
            $proc->bindValue(":customer_phone" , $save_phone);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка обновления: " . $e->getMessage();
            return false;
        }
        return true;
    }
}