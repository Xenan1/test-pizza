<?php

namespace App\Orchid\Resources;

use App\Models\Config;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Throwable;

class ConfigResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Config::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     * @throws Throwable
     */
    public function fields(): array
    {
        return [
            Input::make('about_us')
                ->title('О нас'),
            Input::make('location')->title('Адрес'),
            Input::make('route')->title('Как добраться'),
            Input::make('phone')->title('Телефон'),
            Upload::make('attachments')
                ->title('Главный слайдер')
                ->groups('slider')
                ->acceptedFiles('image/*')
                ->maxFiles(10)
                ->resizeWidth(1600)
                ->resizeHeight(900),
            Upload::make('attachments')
                ->title('Галерея')
                ->groups('gallery')
                ->acceptedFiles('image/*')
        ];
    }

    public function onSave(ResourceRequest $request, Model $model): void
    {
        $model->fill($request->only(['name','about_us','location','route','phone']))->save();

        $ids = $request->input('attachments', []);
        $model->attachments()->sync($ids);
    }

    public function with(): array
    {
        return ['attachments'];
    }

    public static function label(): string
    {
        return 'Настройки сайта';
    }

    public static function singularLabel(): string
    {
        return 'Настройка';
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', 'Название'),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
