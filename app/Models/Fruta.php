<?php

namespace App\Models;

class Fruta {
    static array $deTemporada = [ 
        "01" => ["Naranja", "Mandarina", "Limón", "Kiwi"]
        , "02" => ["Mandarina", "Naranja", "Pomelo", "Plátano"]
        , "03" => ["Fresa", "Plátano", "Manzana", "Pera"]
        , "04" => ["Mango", "Fresa", "Piña", "Plátano"]
        , "05" => ["Piña", "Mango", "Fresa", "Cereza"]
        , "06" => ["Cereza", "Melón", "Sandía", "Albaricoque"]
        , "07" => ["Melón", "Sandía", "Melocotón", "Ciruela"]
        , "08" => ["Sandía", "Melocotón", "Higo", "Uva"]
        , "09" => ["Uva", "Higo", "Pera", "Melocotón"]
        , "10" => ["Manzana", "Pera", "Uva", "Caqui"]
        , "11" => ["Caqui", "Granada", "Mandarina", "Manzana"]
        , "12" => ["Granada", "Naranja", "Mandarina", "Kiwi"] 
    ];

    public static function deTemporada () {
        return static::$deTemporada[date('m')];
    }
}