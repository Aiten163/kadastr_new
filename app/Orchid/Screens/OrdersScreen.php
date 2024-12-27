<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\Service;
use App\Orchid\Layouts\Order\OrderTable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Orchid\Screen\Fields\Select;
use \Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast as FacadesToast;

class OrdersScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders'=>Order::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Заказы';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make("Добавить заказ")->modal('createOrder')->method('create'),
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
            OrderTable::class,
            Layout::modal('createOrder', Layout::rows([
                Input::make('name')->required()->title('Имя'),
                Input::make('surename')->required()->title('Фамилия'),
                Input::make('adress')->required()->title('Адрес'),
                Input::make('number')->required()->title('Телефон')->mask('99999999999'),
                Input::make('email')->type('email')->title('Почта'),
                Select::make('service_id')->fromModel(Service::class, 'name')->title('Услуга'),
                Input::make('note')->title('Заметка'),
            ]))->title("Добавить заказ")->applyButton('Добавить'),
            Layout::modal("editOrder", Layout::rows
            (
                [
                Input::make('order.id')->type('hidden'),
                Input::make('order.name')->required()->title("Имя"),
                Input::make('order.surename')->required()->title("Фамилия"),
                Input::make('order.adress')->required()->title('Адрес'),
                Input::make('order.number')->required()->title('Телефон')->mask('99999999999'),
                Input::make('order.email')->type('email')->title('Почта'),
                Select::make('order.service_id')->fromModel(Service::class, 'name')->title('Услуга'),
                Input::make('order.note')->title('Заметка'),
                Input::make('order.status')->title('Статус')
                ]
            ))->async('asyncGetOrder')
        ];
    }
    public function asyncGetOrder(Order $order): array
    {
        return[
            'order' => $order
        ];
    }
    public function update(Request $request)
    {
    Order::find($request->input('order.id'))->update($request->order);
    Toast::info('Успешно обновлено');
    }
    public function delete(Request $request)
    {
    Order::find($request->order)->delete();
    Toast::info('Успешно удалено');
    }


    public function create(Request $request): void
    {
        $request->validate([
             'number'=> ['required'],
             'name'=> ['required'],
             'surename'=> ['required'],
             'adress'=> ['required'],
             'service_id'=> ['required'],
        ]);
        Order::create($request->merge([
        ])->except('_token'));
        FacadesToast::info('Заказ успешно добавлен');
    }
}
