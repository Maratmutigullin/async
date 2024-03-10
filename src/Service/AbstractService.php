<?php
declare(strict_types=1);

namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Security\Core\Security;

class AbstractService
{
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $em;

//    /**
//     * @var Security
//     */
//    protected Security $security;

    /**
     * UserService constructor.
     * @param EntityManagerInterface $em
     * @param Security $security
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

//    /**
//     * @return User
//     * @throws Exception
//     */
//    public function getUser(): User
//    {
//        $user = $this->security->getUser();
//        if (!$user instanceof User) {
//            throw new Exception(
//                sprintf('Expected App\\Entity\\User, got %s', $user === null ? 'null' : get_class($user))
//            );
//        }
//        return $user;
//    }

//    /**
//     * @param mixed $entity
//     * @throws Exception
//     */
//    public function deleteEntity($entity): void
//    {
//        $entity->setRemovedAt(new \DateTimeImmutable());
//        $entity->setRemovedBy($this->getUser());
//        $this->em->flush();
//    }

    /**
     * @param mixed $entity
     * @throws Exception
     */
    public function restoreEntity($entity): void
    {
        $entity->setRemovedAt(null);
        $entity->setRemovedBy(null);
        $this->em->flush();
    }
}