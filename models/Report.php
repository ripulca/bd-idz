<?php echo
require_once "PDO.php";

class Report extends DB
{
    public function first_report(){
        $proc = $this->pdo->prepare('SELECT R.reader_lastname, R.reader_name, R.reader_patronimic, O.order_create_date, L.librarian_lastname,L.librarian_name, L.librarian_patronimic 
                                    FROM "order" O
                                    INNER JOIN "reader" R ON O.reader_id = R.reader_id
                                    INNER JOIN "librarian" L ON O.librarian_id = L.librarian_id
                                    ORDER BY O.order_create_date');
        $proc->execute();
        return $proc;
    }

    public function second_report(){
        $proc = $this->pdo->prepare('SELECT R.reader_lastname, R.reader_name, R.reader_patronimic, R.reader_address , O.order_create_date, O.order_obtain_method, L.librarian_lastname,L.librarian_name, L.librarian_patronimic, LB.library_name, LB.library_address
                                    FROM "order" O
                                    INNER JOIN "reader" R ON O.reader_id = R.reader_id
                                    INNER JOIN "librarian" L ON O.librarian_id = L.librarian_id
                                    INNER JOIN "library" LB ON O.library_id = LB.library_id
                                    ORDER BY O.order_create_date');
        $proc->execute();
        return $proc;
    }

    public function third_report(){
        $proc = $this->pdo->prepare('SELECT R.reader_lastname, R.reader_name, R.reader_patronimic, R.reader_address , O.order_create_date, O.order_obtain_method, L.librarian_lastname,L.librarian_name, L.librarian_patronimic, LB.library_name, LB.library_address
                                    FROM "order" O
                                    INNER JOIN "reader" R ON O.reader_id = R.reader_id
                                    INNER JOIN "librarian" L ON O.librarian_id = L.librarian_id
                                    INNER JOIN "library" LB ON O.library_id = LB.library_id
                                    ORDER BY O.order_create_date');
        $proc->execute();
        return $proc;
    }

    public function fourth_report(){
        $proc = $this->pdo->prepare('SELECT R.reader_lastname, R.reader_name, R.reader_patronimic, R.reader_address , O.order_create_date, O.order_obtain_method, L.librarian_lastname,L.librarian_name, L.librarian_patronimic, LB.library_name, LB.library_address
                                    FROM "order" O
                                    INNER JOIN "reader" R ON O.reader_id = R.reader_id
                                    INNER JOIN "librarian" L ON O.librarian_id = L.librarian_id
                                    INNER JOIN "library" LB ON O.library_id = LB.library_id
                                    ORDER BY O.order_create_date');
        $proc->execute();
        return $proc;
    }

    public function call_procedure($empty_order_id){
        $proc = $this->pdo->prepare('Call delete_order_if_empty(:empty_order_id);');
        $proc->bindValue(":empty_order_id" , $empty_order_id);
        $proc->execute();
        return $proc;
    }
}