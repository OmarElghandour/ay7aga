<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @ORM\Column(type="string", length=100)
     */
  private $username;
  public function setusername($username)
        {
    return   $this->username = $username;
        }
  public function getusername()
          {
          return $this->username;
  }

          /**
           * @ORM\Column(type="string", length=100)
           */
        private $password;
        public function setpassword($password)
     {
          return   $this->username = $password;
      }
        public function getpassword()
      {
                return $this->password;
      }
}
