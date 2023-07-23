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

        foreach ($grid['rows'] as $key => $value) {
            $gridBuild->addColumn($key, $value);
        }

        $gridBuild->setCTAs($grid['CTAs']);

        $this->grid = $gridBuild;
    }

    protected function rules()
    {
        $data = [];

        foreach ($this->fields as $field) {
            $data[$field['model']] = $field['rules'];
        }

        return $data;
    }

    public function render()
    {
        return view('obelaw::builder.build.grid', [
            'pretitle' => $this->pretitle,
            'title' => $this->title,
            'grid' => $this->grid,
        ])->layout($this->layout());
    }

    protected function layout()
    {
        //
    }
}
