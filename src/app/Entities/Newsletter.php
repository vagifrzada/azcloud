<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string email
 * @property string ip
 * @property string subscribed_at
 */
class Newsletter extends Model
{
    public $timestamps = false;
    protected $table = 'newsletter';
    protected $fillable = ['email', 'ip', 'subscribed_at'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getSubscribedAt(): string
    {
        return $this->subscribed_at;
    }

    public function setSubscribedAt(string $subscribed_at): self
    {
        $this->subscribed_at = $subscribed_at;

        return $this;
    }
}