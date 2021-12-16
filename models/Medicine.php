<?php

require_once "PDO.php";

class Medicine extends DB
{
    public function getAllmedicines(){
        $proc = $this->pdo->prepare("SELECT * FROM medicine");
        $proc->execute();
        return $proc;
    }

    public function getAllmedicinesAmount(){
        $proc = $this->pdo->prepare("SELECT COUNT(medicine_code) FROM medicine");
        $proc->execute();
        return $proc();
    }

    public function getMedicineById($id){
        $proc = $this->pdo->prepare("SELECT * 
                                    FROM medicine
                                    WHERE medicine_code=?; ");

        $proc->bindValue(1, $id, PDO::PARAM_INT);
        $proc->execute();
        return $proc;
    }

    public function fireMedicine($id){
        try {
            $proc = $this->pdo->prepare("DELETE FROM medicine
                                            WHERE medicine_code=?; ");

            $proc->bindValue(1, $id, PDO::PARAM_INT);
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function addMedicine($id, $name, $price, $composition, $pharmgroup, $indications, $side_effects, $contraindications, $pharmachologic_effect){
        try {
            $proc = $this->pdo->prepare("INSERT INTO medicine (medicine_code, medicine_name, medicine_price, medicine_composition, medicine_pharmgroup, medicine_indications, medicine_side_effects, medicine_contraindications, medicine_pharmachologic_effect) 
                                            VALUES (:medicine_code, :medicine_name, :medicine_price, :medicine_composition, :medicine_pharmgroup, :medicine_indications, :medicine_side_effects, :medicine_contraindications, :medicine_pharmachologic_effect); ");

            $save_name = htmlspecialchars($name);
            $save_composition = htmlspecialchars($composition);
            $save_pharmgroup = htmlspecialchars($pharmgroup);
            $save_indications = htmlspecialchars($indications);
            $save_side_effects = htmlspecialchars($side_effects);
            $save_contraindications = htmlspecialchars($contraindications);
            $save_pharmachologic_effect = htmlspecialchars($pharmachologic_effect);

            $proc->bindValue(":medicine_code" , $id);
            $proc->bindValue(":medicine_name" , $save_name);
            $proc->bindValue(":medicine_price" , $price);
            $proc->bindValue(":medicine_composition" , $save_composition);
            $proc->bindValue(":medicine_pharmgroup" , $save_pharmgroup);
            $proc->bindValue(":medicine_indications" , $save_indications);
            $proc->bindValue(":medicine_side_effects" , $save_side_effects);
            $proc->bindValue(":medicine_contraindications" , $save_contraindications);
            $proc->bindValue(":medicine_pharmachologic_effect" , $save_pharmachologic_effect);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка сохранения: " . $e->getMessage();
            return false;
        }
        return true;
    }

    public function updateMedicine($id, $name, $price, $composition, $pharmgroup, $indications, $side_effects, $contraindications, $pharmachologic_effect){
        try {
            $proc = $this->pdo->prepare("UPDATE medicine
                                            SET medicine_name = :medicine_name, medicine_price= :medicine_price, medicine_composition = :medicine_composition, medicine_pharmgroup = :medicine_pharmgroup, medicine_indications = :medicine_indications, medicine_side_effects = :medicine_side_effects, medicine_contraindications = :medicine_contraindications, medicine_pharmachologic_effect = :medicine_pharmachologic_effect
                                            WHERE medicine_code = :medicine_code");

            $save_name = htmlspecialchars($name);
            $save_composition = htmlspecialchars($composition);
            $save_pharmgroup = htmlspecialchars($pharmgroup);
            $save_indications = htmlspecialchars($indications);
            $save_side_effects = htmlspecialchars($side_effects);
            $save_contraindications = htmlspecialchars($contraindications);
            $save_pharmachologic_effect = htmlspecialchars($pharmachologic_effect);

            $proc->bindValue(":medicine_code" , $id);
            $proc->bindValue(":medicine_name" , $save_name);
            $proc->bindValue(":medicine_price" , $price);
            $proc->bindValue(":medicine_composition" , $save_composition);
            $proc->bindValue(":medicine_pharmgroup" , $save_pharmgroup);
            $proc->bindValue(":medicine_indications" , $save_indications);
            $proc->bindValue(":medicine_side_effects" , $save_side_effects);
            $proc->bindValue(":medicine_contraindications" , $save_contraindications);
            $proc->bindValue(":medicine_pharmachologic_effect" , $save_pharmachologic_effect);
            
            $proc->execute();
        } catch (PDOException $e) {
            echo "Ошибка обновления: " . $e->getMessage();
            return false;
        }
        return true;
    }
}