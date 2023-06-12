<?php

namespace App\Provider;

use App\Entity\User;
use Faker\Provider\Base as BaseProvider;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class HashPasswordProvider extends BaseProvider
{
    /**
     * @var UserPasswordHasherInterface
     */
    private UserPasswordHasherInterface $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function hashPassword(string $plainPassword): string
    {
        return $this->encoder->hashPassword(new User(),$plainPassword);
    }

}
