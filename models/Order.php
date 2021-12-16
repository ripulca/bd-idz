<?php

require_once "PDO.php";

class Order extends DB
{
    public function getAllOrders(){
        $proc = $this->pdo->prepare("SELECT * FROM order");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllOrdersAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(order_code) FROM order");
        $proc->execute();
        return $proc->fetch();
    }

    public function getOrderById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM order
                                    WHERE order_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderAmountOfOrderItems($id){
        $proc = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM "order"
                                    WHERE order_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function fireOrder($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM order
                                            WHERE order_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addOrder($id, $name, $last_name, $surname, $city){
        try {
            $proc = $this->pdo->prepare("INSERT INTO order (order_code, order_name, order_surname, order_last_name, order_city) 
                                            VALUES (:order_code, :order_name, :order_surname, :order_last_name, :order_city); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":order_code" , $id);
            $proc->bindValue(":order_name" , $save_name);
            $proc->bindValue(":order_surname" , $save_last_name);
            $proc->bindValue(":order_last_name" , $save_surname);
            $proc->bindValue(":order_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}