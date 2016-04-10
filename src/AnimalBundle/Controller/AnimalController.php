<?php

namespace AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AnimalController extends Controller
{
    /**
     * @Route("/add", name="animal_add")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(get_class($this->get('animal.add.form.type')));
        $form->handleRequest($request);
        $render = [];

        if ($form->isValid()) {
            try {

                $this->get('animal.model')->persistAnimal($form->getData());

                return new RedirectResponse($this->generateUrl('homepage'));

            } catch (\Exception $e) {

                $render['error'] = $e->getMessage();

            }
        }
        $render['animalForm'] = $form->createView();

        return $this->render('@Animal/Default/add.html.twig', $render);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AnimalBundle:Animal');
        $animals = $repository->findBy(['user' => $this->getUser()]);
        return $this->render('@Animal/Default/list.html.twig', ['animals' => $animals]);
    }
}
