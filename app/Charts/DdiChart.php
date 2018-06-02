<?php

namespace mfgs\Charts;

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

        $this->labels(['Janv','Fev','Mar', 'Avr','Mai','Juin', 'Juil','Aout', 'Sept', 'Oct', 'Nov', 'Dec'])
        ->height(50)
        ->loaderColor('red');

    }
}
