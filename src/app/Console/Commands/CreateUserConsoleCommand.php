<?php

namespace App\Console\Commands;

use App\Entities\User;
use Illuminate\Console\Command;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class CreateUserConsoleCommand
 * @package App\Console\Commands
 */
class CreateUserConsoleCommand extends Command
{
    protected $signature = 'make:user';
    protected $description = 'Creating user for admin panel.';
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    public function handle()
    {
        $user = new User();
        $this->userRepository->save($user->fill([
            'name'     => 'AzCloud',
            'email'    => 'root@azcloud.az',
            'password' => bcrypt('secret'),
            'status'   => true,
        ]));

        $this->info('User created successfully !');
        $this->info('Email: root@azcloud.az, Password: secret');
    }
}
