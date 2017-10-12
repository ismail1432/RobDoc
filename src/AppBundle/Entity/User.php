<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 12/10/2017
 * Time: 08:16
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=150)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150)
     */
    private $password;

    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=150)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=150)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var string
     *
     */
    private $plainPassword;


    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @param string $mail
     * @return User
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

}