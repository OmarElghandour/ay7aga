<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductsRepository")
 */
class Products
{
  /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
  private $id;

  public function getid()
          {
          return  $this->id;
          }

    /**
     * @ORM\Column(type="string", length=100)
     */
  private $name;
  public function setName($name)
        {
    return   $this->name = $name;
        }
  public function getName()
          {
          return $this->name;
          }


    /**
     * @ORM\Column(type="decimal", scale=2)
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
       * @ORM\Column(type="text")
       */
    private $description;
    public function setdescription($description)
          {
            $this->description  = $description;
          }


    public function getdescription()
            {
          return  $this->description;
            }

            /**
             * @ORM\Column(type="text", scale=2)
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
