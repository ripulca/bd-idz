<?php

require_once "PDO.php";

class Customer extends DB
{
    public function getAllCustomers(){
        $proc = $this->pdo->prepare("SELECT * FROM customer");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCustomersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(customer_code) FROM customer");
        $proc->execute();
        return $proc->fetch();
    }

    public function getCustomerById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM customer
                                    WHERE customer_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getCustomerAmountOfOrders($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE customer_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
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
}