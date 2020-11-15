<?php

namespace App\Repository;

use App\Entity\Machine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Machine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Machine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Machine[]    findAll()
 * @method Machine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Machine::class);
        $this->manager = $manager;
    }

    //Adds a machine
    public function saveMachine($brand, $model, $manufacturer, $price, $images)
    {
        $newMachine = new Machine();

        $newMachine
            ->setBrand($brand)
            ->setModel($model)
            ->setManufacturer($manufacturer)
            ->setPrice($price)
            ->setImages($images);

        $this->manager->persist($newMachine);
        $this->manager->flush();
    }

    //Updates machine
    public function updateMachine(Machine $machine): Machine
    {
        $this->manager->persist($machine);
        $this->manager->flush();

        return $machine;
    }

    //Deletes Machine
    public function removeMachine(Machine $machine)
    {
        $this->manager->remove($machine);
        $this->manager->flush();
    }


    // /**
    //  * @return Machine[] Returns an array of Machine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Machine
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
