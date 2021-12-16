<?php

require_once "PDO.php";

class Order_item extends DB
{
    public function getAllOrderItems(){
        $proc = $this->pdo->prepare("SELECT * FROM order_item");
        $proc->execute();
        return $proc;
    }

    public function getAllOrder_itemsAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(order_item_code) FROM order_item");
        $proc->execute();
        return $proc;
    }

    public function getOrderItemById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM order_item
                                    WHERE order_item_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function fireOrderItem($id){
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

    public function addOrderItem($id, $order_id, $medicine_id, $provider_id, $order_item_amount, $price){
        try {
            $proc = $this->pdo->prepare("INSERT INTO order_item (order_item_code, order_code, medicine_code, order_item_amount, order_item_price, provider_code) 
                                            VALUES (:order_item_code, :order_code, :medicine_code, :order_item_amount, :order_item_price, :provider_code); ");

            $proc->bindValue(":order_item_code" , $id);
            $proc->bindValue(":order_code" , $order_id);
            $proc->bindValue(":medicine_code" , $medicine_id);
            $proc->bindValue(":order_item_amount" , $order_item_amount);
            $proc->bindValue(":order_item_price" , $price);
            $proc->bindValue(":provider_code" , $provider_id);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}