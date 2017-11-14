<?php
namespace ProductBundle\Controller;
use ProductBundle\Entity\Products;
use ProductBundle\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class DefaultController extends Controller
{

  /**
   * @Route("/", name="productpage")
   */
  public function productpage()
{
  return $this->render('product.html.twig');
}
/**
 * @Route("/add", name="addproduct")
 */
public function addproduct(Request $request)
{
 $Product = new Products;
 $form = $this->createFormBuilder( $Product)
            ->add('name', TextType::class,array('label' => 'Product Name','attr'=> array('class'=>'form-control')))
            ->add('price', TextType::class,array('label' => 'Product Price','attr'=> array('class'=>'form-control')))
            ->add('description', TextType::class,array('label' => 'Product Description','attr'=> array('class'=>'form-control')))
            ->add('image', FileType::class, array('label' => 'product image'))
            ->add('save', SubmitType::class, array('label' => 'Add New Product','attr'=> array('class'=>'btn btn-primary')))
            ->getForm();
            $form->handleRequest($request);
 if ($form->isSubmitted()) {
      $file = $Product->getimage();
      $fileName = md5(uniqid()).'.'.$file->guessExtension();
      $file->move('images/',$fileName);
      $Product->setimage($fileName);
      $Product = $form->getData();
      $insert = $this->getDoctrine()->getManager();
      $insert->persist($Product);
      $insert->flush();
  }
    return $this->render('form.html.twig', array(
     'addform' => $form->createview(),
  ));
}

/**
 * @Route("/show", name="shwoaction")
 */
public function shwoaction()
{
  $repository = $this->getDoctrine()->getRepository(Products::class);
  $products = $repository->findAll();
  return $this->render('show.html.twig', ['products'=>$products]);
}
  /**
   * @Route("/addtocard", name="addtocard")
   */
public function addtocard(Request $Request)
{
 $card = new Card;
 $card->setproduct_id($Request->get('product_id'));
 $card->setname($Request->get('pname'));
 $card->setprice($Request->get('pprice'));
 $card->setimage($Request->get('pimage'));
 $insert = $this->getDoctrine()->getManager();
 $insert->persist($card);
 $insert->flush();
 return $this->render('card.html.twig', ['card'=>$card]);
}
/**
 * @Route("/card", name="showcart")
 */
public function showcart()
{
  $card_id = new Card;
  $repository = $this->getDoctrine()->getRepository(Card::class);
  $card = $repository->findAll();
  return $this->render('card.html.twig',['card'=>$card ]);
}
/**
 * @Route("/delete/{id}", name="deletecart")
 */
public function deletecart($id)
{
$card = new Card;
$em = $this->getDoctrine()->getManager();
$item_id = $em->getRepository('ProductBundle:Card')->find($id);
$em->remove($item_id);
$em->flush();
return $this->render('card.html.twig',['card'=>$card ]);

}















}
