<?php

namespace App\Managers\User;

/**
 * Class UserParameterBag
 * @package App\Managers\User
 */
class UserParameterBag
{
    private $name;
    private $email;
    private $password;
    private $status;

    public function __construct(
        string $name,
        string $email,
        ?string $password,
        ?string $status
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getStatus(): int
    {
        return (int) $this->status;
    }
}