<?php

namespace App\Widgets;

use App\Entities\Product\Category\Category;
use App\Entities\Product\Product;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Collection;

class ProductPriceListWidget extends AbstractWidget
{
    protected $config = [
        'product' => null,
    ];

    public function run(): string
    {
        /** @var Product $product */
        /** @var Collection $prices */
        if (!filled($product = $this->config['product'])) return '';
        if (!filled($prices = $product->prices)) return '';
        $category = $product->getCategory();

        $familyLabels = $this->getFamilyLabes();
        $families = $prices->pluck('family')->unique()->map(function ($family) use ($familyLabels) {
            return ['value' => $family, 'label' => $familyLabels[$family] ?? $family];
        })->values();

        return view($this->getRenderableByCategory($category),
            compact('product', 'prices', 'families', 'category')
        );
    }

    private function getRenderableByCategory(Category $category): string
    {
        return $category->getSlug() === 'storage'
            ? 'widgets.storage_product_price_list'
            : 'widgets.vm_product_price_list';
    }

    private function getFamilyLabes(): array
    {
        return [
            'a' => __('bundles.family-a'),
            'b' => __('bundles.family-b'),
            'c' => __('bundles.family-c'),
            's' => __('bundles.family-s'),
            't' => __('bundles.family-t'),
            'u' => __('bundles.family-u'),
        ];
    }
}
