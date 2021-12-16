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
                                    FROM "order_item"
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

    public function addOrder($id, $customer_id, $doctor_id, $courier_id, $end_date, $pay_date, $discount, $delivery_address){
        try {
            $proc = $this->pdo->prepare("INSERT INTO order (order_code, customer_code, doctor_code, courier_code, order_end_date, order_pay_date, order_discount, order_delivery_address) 
                                            VALUES (:order_code, :customer_code, :doctor_code, :courier_code, :order_end_date, :order_pay_date, :order_discount, :order_delivery_address); ");

            $save_delivery_address = htmlspecialchars($delivery_address);

            $proc->bindValue(":order_code" , $id);
            $proc->bindValue(":customer_code" , $customer_id);
            $proc->bindValue(":doctor_code" , $doctor_id);
            $proc->bindValue(":courier_code" , $courier_id);
            $proc->bindValue(":order_end_date" , $end_date);
            $proc->bindValue(":order_pay_date" , $pay_date);
            $proc->bindValue(":order_discount" , $discount);
            $proc->bindValue(":order_delivery_address" , $save_delivery_address);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }
}