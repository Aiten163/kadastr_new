<?php

namespace App\Orchid\Layouts\Service;
use App\models\Service;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ServiceTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'services';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Номер услуги')->width('50px')->sort()->filter(TD::FILTER_NUMERIC),
            TD::make('name', 'Название услуги')->sort()->width('170px'),
            TD::make('text', 'Описание')->width('350px'),
            TD::make('price', 'Цена от'),
            TD::make('image', 'Фото')
                ->render(function(Service $service){
                    return view('tablePhoto', ['path' => $service->image]);
                }),
            TD::make('position', 'Позиция')->filter(TD::FILTER_TEXT)->sort()->width('100px'),
            TD::make('created_at', 'Дата создания')->defaultHidden()->sort(),
            TD::make('action', '')
                ->width('15px')
                ->cantHide()
                ->render(function (Service $service)
            {
                return ModalToggle::make("")
                    ->modal('editService')
                    ->icon('pen')
                    ->method('update')
                    ->modalTitle('Редактирование услуги'.$service->name)
                    ->asyncParameters([
                            'service' =>$service->id
                        ]
                    );
            }),
            TD::make('action','')
                ->width('15px')
                ->cantHide()
                ->render(function (Service $service)
                {
                    return Button::make("")
                        ->icon('trash')
                        ->method('delete',[
                            'service'=>$service->id
                        ]);
                })];
    }
}
