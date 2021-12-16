<?php

require_once "PDO.php";

class Order_item extends DB
{
    public function getAllOrder_items(){
        $proc = $this->pdo->prepare("SELECT * FROM order_item");
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllOrder_itemsAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(order_item_code) FROM order_item");
        $proc->execute();
        return $proc->fetch();
    }

    public function getOrder_itemById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM order_item
                                    WHERE order_item_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc->fetch(PDO::FETCH_ASSOC);
    }

    public function fireOrder_item($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM order_item
                                            WHERE order_item_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addOrder_item($id, $order_id, $medicine_id, $provider_id, $order_item_amount, $price, $surname, $city){
        try {
            $proc = $this->pdo->prepare("INSERT INTO order_item (order_item_code, order_code, medicine_code, order_item_amount, order_item_price, provider_code) 
                                            VALUES (:order_item_code, :order_item_name, :order_item_surname, :order_item_last_name, :order_item_city); ");

            $save_name = htmlspecialchars($name);
            $save_last_name = htmlspecialchars($last_name);
            $save_surname = htmlspecialchars($surname);
            $save_city = htmlspecialchars($city);

            $proc->bindValue(":order_item_code" , $id);
            $proc->bindValue(":order_item_name" , $save_name);
            $proc->bindValue(":order_item_surname" , $save_last_name);
            $proc->bindValue(":order_item_last_name" , $save_surname);
            $proc->bindValue(":order_item_city" , $save_city);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}