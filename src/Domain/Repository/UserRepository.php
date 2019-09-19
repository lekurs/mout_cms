<?php


namespace App\Domain\Repository;


use App\Domain\Models\User;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getAllByRole(): array
    {
        return $this->createQueryBuilder('user')
                                ->orderBy('user.roles', 'ASC')
                                ->addOrderBy('user.username', 'ASC')
                                ->getQuery()
                                ->getResult();
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
        $this->_em->flush();
    }
}