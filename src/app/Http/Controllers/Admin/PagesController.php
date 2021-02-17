<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Entities\Page\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Commands\Page\DeletePageCommand;
use App\Commands\Page\CreatePageCommand;
use App\Commands\Page\UpdatePageCommand;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Core\CommandBus\CommandBusInterface;
use App\Http\Requests\Page\CreatePageRequest;

class PagesController extends Controller
{
    private $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::oldest('order')->where('parent_id', 0)->with('children')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(CreatePageRequest $request): RedirectResponse
    {
        try {
            $this->bus->dispatch(new CreatePageCommand(), $request->toArray());
            return redirect()->route('admin.pages.index')->with('success', "Page created successfully !");
        } catch (Throwable $e) {
            return redirect()->route('admin.pages.index')->with('error', $e->getMessage());
        }
    }

    public function edit(Page $page)
    {
        $gallery = [];
        foreach ($page->getGallery() as $media)
            $gallery[$media->uuid] = $media->getUrl();
        return view('admin.pages.edit', compact('page', 'gallery'));
    }

    public function update(Page $page, UpdatePageRequest $request): RedirectResponse
    {
        try {
            $this->bus->dispatch(new UpdatePageCommand($page), $request->toArray());
            return redirect()->back()->with('success', 'Page updated successfully !');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateNestable(Request $request): void
    {
        $order = 0;
        $this->reOrderPage($request->get('list', []), $order);
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->bus->dispatch(new DeletePageCommand($id));
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully !');
    }

    private function reOrderPage(array $list, int &$order = 0, int $parent = 0)
    {
        foreach ($list as $item) {
            $order++;

            Page::findOrFail($item['id'])->update(['parent_id' => $parent, 'order' => $order]);

            if (isset($item['children']) && filled($item['children']))
                $this->reOrderPage($item['children'], $order, $item['id']);
        }
    }
}