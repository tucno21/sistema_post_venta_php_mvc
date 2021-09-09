<?php

namespace Model;

class Sales extends Template
{
    protected static $table = 'sales';

    public static function AllSales()
    {
        // $query1 = "SELECT * FROM " . self::$table;
        $query = "SELECT S.id, S.sale_code, S.products, S.net, S.total, S.payment_method, S.registration_date, 
                        C.name, 
                        U.name_u  
                    FROM sales S 
                    INNER JOIN clients C ON S.clientId = C.id 
                    INNER JOIN users U ON S.sellerId = U.id ";
        // $query = "SELECT * FROM products P INNER JOIN categories C ON P.categoryId = C.id";

        $stmt = self::$db->query($query);

        //Pasar todos los datos a arreglo asociativo
        $resultadato = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        //convertir el arreglo a objeto
        $mi_objeto = json_decode(json_encode($resultadato));
        // debuguear($mi_objeto);

        //enviar objeto de la respuesta
        return $mi_objeto;

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }


    public static function BuscarRango($fi, $ff)
    {
        if ($fi == $ff) {
            // $query = "SELECT * FROM sales WHERE registration_date like '%$ff%'";
            $query = "SELECT S.id, S.sale_code, S.products, S.net, S.total, S.payment_method, S.registration_date, 
                        C.name, 
                        U.name_u  
                    FROM sales S 
                    INNER JOIN clients C ON S.clientId = C.id 
                    INNER JOIN users U ON S.sellerId = U.id 
                    WHERE S.registration_date like '%$ff%' ";
            // debuguear($query);
        } else {
            // $query = "SELECT * FROM sales WHERE registration_date BETWEEN '$fi' AND '$ff'";
            $query = "SELECT S.id, S.sale_code, S.products, S.net, S.total, S.payment_method, S.registration_date, 
                        C.name, 
                        U.name_u  
                    FROM sales S 
                    INNER JOIN clients C ON S.clientId = C.id 
                    INNER JOIN users U ON S.sellerId = U.id 
                    WHERE S.registration_date BETWEEN '$fi' AND '$ff'";
        }

        // $query1 = "SELECT * FROM " . self::$table;
        // $query = "SELECT * FROM products P INNER JOIN categories C ON P.categoryId = C.id";

        $stmt = self::$db->query($query);

        //Pasar todos los datos a arreglo asociativo
        $resultadato = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        //convertir el arreglo a objeto
        $mi_objeto = json_decode(json_encode($resultadato));
        // debuguear($mi_objeto);

        //enviar objeto de la respuesta
        return $mi_objeto;

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
