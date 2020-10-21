<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index');
    }

    public function create()
    {
        dd('Create user form');
    }

    public function store()
    {
        dd('Store user');
    }

    public function edit(User $user)
    {

    }

    public function delete($id)
    {
        try {
            $user = $this->userRepository->get($id);
            $this->userRepository->remove($user);
            return redirect()->back()->with('success', 'User: [' . $user->getName() . '] deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}