<?php

namespace App\Orchid\Resources;

use App\Models\Config;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Throwable;

class RoomResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Room::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     * @throws Throwable
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Название'),
            Input::make('price')->title('Цена'),
            Input::make('capacity')->title('Вместимость'),
            Input::make('description')->title('Описание'),
            Upload::make('attachments')
                ->title('Изображение')
                ->maxFiles(1)
                ->acceptedFiles('image/*')
        ];
    }

    public function onSave(ResourceRequest $request, Model $model): void
    {
        $model->fill($request->only(['name','price','capacity','description']))->save();

        $ids = $request->input('attachments', []);
        $model->attachments()->sync($ids);
    }

    public function with(): array
    {
        return ['attachments'];
    }

    public static function label(): string
    {
        return 'Номера';
    }

    public static function singularLabel(): string
    {
        return 'Номер';
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
