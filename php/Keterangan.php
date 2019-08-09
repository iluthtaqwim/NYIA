<?php
abstract class Enum
{
    final public function __construct($value)
    {
        $c = new ReflectionClass($this);
        if(!in_array($value, $c->getConstants())) {
            throw IllegalArgumentException();
        }
        $this->value = $value;
    }

    final public function __toString()
    {
        return $this->value;
    }
}

class Keterangan extends Enum{
    const MENCOBA_MASUK = 1;
    const MASUK_PORTAL = 2;
    const MEMASUKAN_NODIN_BARU = 3;
    const MENOLAK_NODIN = 4;
    const MENERIMA_NODIN = 5;
    const MEREVISI_NODIN = 6;
    const MENANDATANGANI_NODIN = 7;
}
?>
