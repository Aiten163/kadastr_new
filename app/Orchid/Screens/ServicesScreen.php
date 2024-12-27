<?php

namespace App\Orchid\Screens;

use App\Models\Service;
use App\Orchid\Layouts\Service\ServiceTable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Orchid\Screen\Fields\Picture;
use \Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast as FacadesToast;

class ServicesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'services'=>Service::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Услуги';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make("Добавить услугу")->modal('createService')->method('create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return
            [
                ServiceTable::class,
                Layout::modal('createService', Layout::rows([
                    Input::make('name')->required()->title('Имя услуги'),
                    Input::make('text')->required()->title('Описание'),
                    Input::make('price')->title('Цена от'),
                    Picture::make('image')->title('Фото'),
                    Input::make('position')->title('Позиция')->type('number'),
                ]))->title("Добавить заказ")->applyButton('Добавить'),
                Layout::modal("editService", Layout::rows
                (
                    [
                        Input::make('service.id')->type('hidden'),
                        Input::make('service.name')->required()->title("Имя услуги"),
                        Input::make('service.text')->required()->title("Описание"),
                        Picture::make('service.image')->required()->title('Фото'),
                        Input::make('service.position')->required()->title('Позиция')->type('number'),
                    ]
                ))->async('asyncGetService')
            ];
    }
    public function asyncGetService(Service $service): array
    {
        return[
            'service' => $service
        ];
    }
    public function update(Request $request)
    {
        Service::find($request->input('service.id'))->update($request->service);
        Toast::info('Успешно обновлено');
    }
    public function delete(Request $request)
    {
        Service::find($request->service)->delete();
        Toast::info('Успешно удалено');
    }


    public function create(Request $request): void
    {
        $request->validate([
            'position'=> ['required'],
            'text'=> ['required'],
            'name'=> ['required'],
            'image'=> ['required'],
            'price'=> ['integer'],
        ]);
        Service::create($request->merge([
        ])->except('_token'));
        FacadesToast::info('Услуга успешно добавлена');
    }
}
