<?php
class TV
{
    public $manufacturer;
    public $channel;
    public $volume;

    public function __construct(string $manufacturer, int $channel = 1, int $volume = 50)
    {
        $this->manufacturer = $manufacturer;
        $this->channel = $channel;
        $this->volume = $volume;
    }

    public function getManufacturer(){
        return $this->manufacturer;
    }
    public function getChannel(){
        return $this->channel;
    }
    public function getVolume(){
        return $this->volume;
    }

    public function setManufacturer(string $value){
        $this->manufacturer = $value;
    }
    public function setChannel(int $value){
        if($value > 50){
            $this->channel = 1;
            }
            else if($value < 0){
                $this->channel = 1;
            }
            else{
                $this->channel = $value;
            }
    }
    public function setVolume(int $value){
        if($value > 100){
        $this->volume = 100;
        }
        else if($value < 0){
            $this->volume = 0;
        }
        else{
            $this->volume = $value;
        }
    }

    public function reset(){
        $this->channel = 1;
        $this->volume = 50;
    }

    public function info(){
        return "TV name: ".$this->manufacturer. " current channel: " .$this->channel. " volume level: " .$this->volume;
    }
    public function meme(){
        return "Televizorius 'Sony' šiuo metu rodo 8 kanalą, o jogarso lygis 76.";
    }
}

?>