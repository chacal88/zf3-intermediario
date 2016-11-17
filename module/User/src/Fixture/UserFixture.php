<?php


namespace User\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\User;

class UserFixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("kauemsc@gmail.com");
        $user->setFullName("Kaue rodrigues dos santos");
        $user->setPassword(password_hash("kauemsc@gmail.com", PASSWORD_DEFAULT));

        $manager->persist($user);
        $manager->flush();

    }

}