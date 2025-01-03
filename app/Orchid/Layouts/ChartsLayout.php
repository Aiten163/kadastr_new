<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Chart;

class ChartsLayout extends Chart
{
    /**
     * Add a title to the Chart.
     *
     * @var string
     */
    protected $title = 'DemoCharts';

    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'
     *
     * @var string
     */
    protected $type = 'bar';

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the charts.
     *
     * @var string
     */
    protected $target = 'charts';
}
