<?php

namespace Model;

class Products extends Template
{
    protected static $table = 'products';



    public static function AllProdCategory()
    {
        // $query1 = "SELECT * FROM " . self::$table;
        $query = "SELECT P.id, P.code, p.description, P.image, P.stock, P.price_buy, P.price_sale, P.date, C.category FROM products P INNER JOIN categories C ON P.categoryId = C.id ";
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
