<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 12/10/2017
 * Time: 00:45
 */


namespace AppBundle\Manager;

use AppBundle\Entity\Message;
use Doctrine\ORM\EntityManager;

class MessageManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveMessage(Message $message) :void
    {
        //set current user
        // but for test I set my name
        $message->setAuthor('Smaine');
        $message->setDateSend(new \DateTime('NOW'));
        $this->entityManager->persist($message);
        $this->entityManager->flush();
        return;
    }


}