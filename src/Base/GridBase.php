<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Grid;
use Livewire\Component;
use Livewire\WithPagination;

abstract class GridBase extends Component
{
    use WithPagination;

    protected $pretitle = 'Pre Title';
    protected $title = 'Title';
    protected $paginationTheme = 'bootstrap';

    private $grid = null;

    public function boot()
    {
        $grid = Cache::get('obelawGrids')[$this->gridId];

        $gridBuild = Grid::model($grid['model']);

        $gridBuild->setBottoms($grid['bottoms']);

        foreach ($grid['rows'] as $row) {
            $gridBuild->addColumn($row['label'], $row['dataKey'], $row['filter']);
        }

        $gridBuild->setCTAs($grid['CTAs']);
        $gridBuild->initFilter($grid['filter']);

        $this->grid = $gridBuild;
    }

    public function preTitle()
    {
        return $this->pretitle;
    }

    public function title()
    {
        return $this->title;
    }

    public function render()
    {
        return view('obelaw::builder.build.grid', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
            'grid' => $this->grid,
            'canRemoveRow' => method_exists($this, 'removeRow'),
        ])->layout($this->layout());
    }

    protected function layout()
    {
        //
    }
}
