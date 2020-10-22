<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Entities\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Managers\User\{UserService, UserParameterBag};
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $userRequest)
    {
        try {
            $user = $this->userService->create(new UserParameterBag(
                $userRequest->get('name'),
                $userRequest->get('email'),
                $userRequest->get('password'),
                $userRequest->get('status')
            ));
            return redirect()->route('admin.users.index')->with('success', "[{$user->getName()}] was created successfully !");
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $userRequest)
    {
       try {
           $this->userService->update($user, new UserParameterBag(
               $userRequest->get('name'),
               $userRequest->get('email'),
               $userRequest->get('password'),
               $userRequest->get('status')
           ));
           return redirect()->back()->with('success', "[{$user->getName()}] was updated successfully !");
       } catch (Throwable $e) {
           return redirect()->back()->with('error', $e->getMessage());
       }
    }

    public function delete($id)
    {
        try {
            $this->userService->delete($id);
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}