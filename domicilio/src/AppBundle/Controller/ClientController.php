<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ClientController extends Controller
{
    /**
     * @Route("/client", name="sign_up")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     */
    public function createAction(Request $request)
    {
        $user = new Client();

        $form = $this->createFormBuilder( $user )
            ->add( 'name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')) )
            ->add( 'lastname', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')) )
            ->add( 'birthday', DateTimeType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')) )
            ->add( 'email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')) )
            ->add( 'save', SubmitType::class, array('label' => 'Create Client', 'attr' => array('class' => 'btn btn primary', 'style' => 'margin-bottom:15px')) )
            ->getForm();


        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            //to get data
            $name = $form ['name']->getData();
            $lastname = $form ['lastname']->getData();
            $birthday = $form ['birthday']->getData();
            $email = $form ['email']->getData();
            $now = new\DateTime( 'now' );

            var_dump($now);

            $user->setName( $name );
            $user->setLastname( $lastname );
            $user->setBirthday( $birthday );
            $user->setEmail( $email );
            $user->setCreated( $now );

            $em = $this->getDoctrine()->getManager();

            $em->persist( $user );
            $em->flush();

            return $this->redirectToRoute( 'sign_up' );

        }

        return $this->render( 'Client/client.html.twig', array(
            'form' => $form->createView()
        ) );
    }
}