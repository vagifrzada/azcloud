<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Entities\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Core\CommandBus\CommandBusInterface;
use App\Http\Requests\User\{CreateUserRequest, UpdateUserRequest};
use App\Commands\User\{CreateUserCommand, UpdateUserCommand, DeleteUserCommand};

class UsersController extends Controller
{
    private $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $userRequest): RedirectResponse
    {
        try {
            $this->bus->dispatch(new CreateUserCommand(), $userRequest->toArray());
            return redirect()->route('admin.users.index')->with('success', "User created successfully !");
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $userRequest): RedirectResponse
    {
       try {
           $this->bus->dispatch(new UpdateUserCommand($user), $userRequest->toArray());
           return redirect()->back()->with('success', 'User was updated successfully !');
       } catch (Throwable $e) {
           return redirect()->back()->with('error', $e->getMessage());
       }
    }

    public function delete($id): RedirectResponse
    {
        try {
            $this->bus->dispatch(new DeleteUserCommand($id));
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}