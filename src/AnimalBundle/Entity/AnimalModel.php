<?php

namespace AnimalBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AnimalModel
{
    /** @var EntityManager */
    private $em;

    /** @var TokenStorage $tokenStorage*/
    private $tokenStorage;

    public function __construct(EntityManager $em, TokenStorage $tokenStorage)
    {
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
    }

    public function persistAnimal(Animal $animal)
    {
        $user = $this->tokenStorage->getToken()->getUser();
        if (!$user) {
            throw new \RuntimeException('Необходимо залогиниться!');
        }
        $animal->setUser($user);
        $this->em->persist($animal);
        $this->em->flush($animal);
    }
}