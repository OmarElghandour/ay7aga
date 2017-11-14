<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table(name="card")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\CardRepository")
 */
class Card
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
     * @ORM\Column(type="integer", length=100)
     */
private $product_id;

public function setproduct_id($product_id)
      {
  return   $this->product_id= $product_id;
      }
public function getproduct_id()
        {
        return $this->product_id;
        }
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */


    private $name;
    public function setName($name)
          {
      return   $this->name= $name;
          }
    public function getName()
            {
            return $this->name;
            }


      /**
       * @ORM\Column(type="decimal", scale=2 , nullable=true)
       */
      private $price;

      public function setprice($price)
            {
              $this->price = $price;
            }
      public function getprice()
              {
              return  $this->price;
              }

              /**
               * @ORM\Column(type="decimal", scale=2, nullable=true)
               */
  private $image;

  public function setimage($image)
  {
    $this->image = $image;
  }
  public function getimage()
  {
  return  $this->image;
  }









}
