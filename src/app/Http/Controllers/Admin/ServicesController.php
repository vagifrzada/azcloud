<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Entities\Service\Service;
use App\Http\Controllers\Controller;
use App\DataTables\ServicesDataTable;
use Illuminate\Http\RedirectResponse;
use App\Core\CommandBus\CommandBusInterface;
use App\Http\Requests\Service\{CreateServiceRequest, UpdateServiceRequest};
use App\Commands\Service\{CreateServiceCommand, UpdateServiceCommand, DeleteServiceCommand};

class ServicesController extends Controller
{
    private $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(CreateServiceRequest $request): RedirectResponse
    {
        try {
            $this->bus->dispatch(new CreateServiceCommand(), $request->toArray());
            return redirect()->route('admin.services.index')->with('success', "Service created successfully !");
        } catch (Throwable $e) {
            return redirect()->route('admin.services.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Service $service, UpdateServiceRequest $request): RedirectResponse
    {
        try {
            $this->bus->dispatch(new UpdateServiceCommand($service), $request->toArray());
            return redirect()->back()->with('success', "Service updated successfully !");
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id): RedirectResponse
    {
        try {
            $this->bus->dispatch(new DeleteServiceCommand((int) $id));
            return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully !');
        } catch (Throwable $e) {
            return redirect()->route('admin.services.index')->with('error', $e->getMessage());
        }
    }
}