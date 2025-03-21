<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use App\Models\Banner;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use App\MoonShine\Resources\CategoryResource;

/**
 * @extends ModelResource<Banner>
 */
class BannersResource extends ModelResource
{
    protected string $model = Banner::class;

    protected string $title = 'Banners';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('title'),
            Text::make('description'),
            File::make('image'),
            Select::make('position')
                ->options([
                    'top'=>'top',
                    'middle'=>'middle',
                    'ads'=>'ads',
                    'bottom'=>'bottom'
                ]),
            BelongsTo::make(
                'Category',
                'category',
                fn($item) => $item->id . '. ' . $item->name,
                CategoryResource::class
            )
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('title'),
                Text::make('description'),
                File::make('image'),
                Select::make('position')
                    ->options([
                        'top'=>'top',
                        'middle'=>'middle',
                        'ads'=>'ads',
                        'bottom'=>'bottom'
                    ]),
                BelongsTo::make(
                    'Category',
                    'category',
                    fn($item) => $item->id . '. ' . $item->name,
                    CategoryResource::class
                )
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('title'),
            Text::make('description'),
            Image::make('image'),
            Select::make('position')
                ->options([
                    'top'=>'top',
                    'middle'=>'middle',
                    'ads'=>'ads',
                    'bottom'=>'bottom'
                ]),
            BelongsTo::make(
                'Category',
                'category',
                fn($item) => $item->id . '. ' . $item->name,
                CategoryResource::class
            )
        ];
    }

    /**
     * @param Banner $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [

        ];
    }
}
