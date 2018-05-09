<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DdiChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->labels(['Bloquant','Urgent','En attente', 'Retardé'])
        ->height(50)
        ->width(80)
        ->options(['legend' => ['display' => false]]);
    }
}
