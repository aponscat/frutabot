<?php

namespace App\Models;

class Verdura {
    static array $deTemporada = [
        "01" => ["Acelga", "Alcachofa", "Brócoli", "Coliflor"],
        "02" => ["Espinaca", "Guisante", "Hinojo", "Puerro"],
        "03" => ["Zanahoria", "Espárrago", "Remolacha", "Rábano"],
        "04" => ["Berenjena", "Cebolleta", "Judía verde", "Lechuga"],
        "05" => ["Calabacín", "Pepino", "Pimiento", "Tomate"],
        "06" => ["Albahaca", "Berenjena", "Calabacín", "Pepino"],
        "07" => ["Cebolla", "Calabacín", "Tomate", "Pimiento"],
        "08" => ["Berenjena", "Calabacín", "Pepino", "Tomate"],
        "09" => ["Calabaza", "Berenjena", "Pimiento", "Tomate"],
        "10" => ["Calabaza", "Coliflor", "Nabo", "Zanahoria"],
        "11" => ["Alcachofa", "Brócoli", "Col", "Espinaca"],
        "12" => ["Acelga", "Apio", "Col", "Puerro"]
    ];

    public static function deTemporada () {
        return static::$deTemporada[date('m')];
    }
}