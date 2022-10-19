<?php
namespace model;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */
class Users {
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;


    /** 
     * @ORM\Column(type="string")
     */
    protected $Emails;


   /**
     * @ORM\Column(
     * name="Passwords",
     * type="string",
     * )
     */
    protected $Passwords;

    public function getId(){
        return $this->id;
    }
    public function getPasswords(){
        return $this->Passwords;
    }
    public function getEmails(){
        return $this->Emails;
    }
}
