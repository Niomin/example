<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class UserModel
{
    /** @var UserPasswordEncoder */
    private $encoder;

    /** @var EntityManager */
    private $em;

    public function __construct(UserPasswordEncoder $encoder, EntityManager $em)
    {
        $this->encoder = $encoder;
        $this->em = $em;
    }

    public function persistUser(User $user)
    {
        $password = $this->encoder
            ->encodePassword($user, $user->getPlainPassword());

        $user->setPassword($password);
        $user->setEnabled(true);

        $this->em->persist($user);
        $this->em->flush($user);
    }
}