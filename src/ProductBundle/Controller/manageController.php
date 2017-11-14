<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\manage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Manage controller.
 *
 * @Route("manage")
 */
class manageController extends Controller
{
    /**
     * Lists all manage entities.
     *
     * @Route("/", name="manage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $manages = $em->getRepository('ProductBundle:manage')->findAll();

        return $this->render('manage/index.html.twig', array(
            'manages' => $manages,
        ));
    }

    /**
     * Finds and displays a manage entity.
     *
     * @Route("/{id}", name="manage_show")
     * @Method("GET")
     */
    public function showAction(manage $manage)
    {

        return $this->render('manage/show.html.twig', array(
            'manage' => $manage,
        ));
    }
}
