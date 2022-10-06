<?php 
class Fruit
{
    public function __construct(public int $size = 0, public int $id = 0, public $bitten = false)
    {
        $this->size = rand(5 , 25);
        $this->id = rand(1000000, 9999999);
        $this->bitten = false;
    }

    public function myJawsThatBite()
    {
        $this->bitten = true;
    }
}
class Basket
{
    public static array $fruits = [];
    public static $unalived;

    public static function Fill()
    {
        for($i = 1; $i <= 20; $i++)
        {
            array_push(self::$fruits,new Fruit(false));
        }
        usort(self::$fruits, function($a, $b){
            return $b->size- $a->size;
        });
        return self::$fruits;
    }

    public static function fillTo()
    {
        while(count(self::$fruits) < 20)
        {
            array_push(self::$fruits,new Fruit(false));
        }
        usort(self::$fruits, function($a, $b){
            return $b->size- $a->size;
        });
        return self::$fruits;
    }

    public static function unAlive()
    {
        $unalived = array_shift(self::$fruits);
        return $unalived;
    }
}
?>