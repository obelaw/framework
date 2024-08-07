<?php

namespace Obelaw\UI\Renderer;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Obelaw\Facades\Bundles;
use Obelaw\Permissions\Permission;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Renderer\Grid\Export;
use Obelaw\UI\Renderer\Grid\Grid;
use Obelaw\UI\Views\Layout\DashboardLayout;
use ReflectionMethod;

abstract class GridRender extends Component
{
    use BootPermission;
    use WithPagination;

    public $search = '';

    protected $pretitle = 'Pre Title';
    protected $title = 'Title';
    protected $paginationTheme = 'bootstrap';

    private $grid = null;
    private $tableRender = null;

    public function boot()
    {
        $this->bootPermission();

        // $grid = Bundles::getGrids($this->gridId);

        // $gridRender = new Grid($this);
        // $gridRender->setModel($grid['model']);
        // $gridRender->setWhere($grid['where']);
        // $gridRender->setBottoms($grid['buttons']);
        // $gridRender->setActions($grid['actions']);
        // $gridRender->whereSearch('s');

        // $tableRender = $gridRender->table();
        // $tableRender->setCTAs($grid['CTAs']);
        // $tableRender->initFilter($grid['filter']);

        // foreach ($grid['rows'] as $row) {
        //     $tableRender->addColumn($row['label'], $row['dataKey'], $row['filter']);
        // }

        // $this->grid = $gridRender;
        // $this->tableRender = $tableRender;
    }

    public function preTitle()
    {
        return Str::contains($this->pretitle, '::grids') ? __($this->pretitle) : $this->pretitle;
    }

    public function title()
    {
        return Str::contains($this->title, '::grids') ? __($this->title) : $this->title;
    }

    public function render()
    {
        $grid = Bundles::getGrids($this->gridId);

        $gridRender = new Grid($this);
        $gridRender->setModel($grid['model']);
        $gridRender->setWhere($grid['where']);
        $gridRender->setBottoms($grid['buttons']);
        $gridRender->setActions($grid['actions']);
        $gridRender->whereSearch($this->search);

        $tableRender = $gridRender->table();
        $tableRender->setCTAs($grid['CTAs']);
        $tableRender->initFilter($grid['filter']);

        foreach ($grid['rows'] as $row) {
            $tableRender->addColumn($row['label'], $row['dataKey'], $row['filter']);
        }

        $this->grid = $gridRender;
        $this->tableRender = $tableRender;

        return view('obelaw-ui::renderer.grid', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
            'bottoms' => $this->grid->bottoms,
            'actions' => $this->grid->actions,
            'table' => $this->tableRender,
            'canRemoveRow' => $this->canRemoveRow(),
        ])->layout(DashboardLayout::class);
    }

    public function export()
    {
        return new Export($this->grid);
    }

    private function canRemoveRow()
    {
        if (!method_exists($this, 'removeRow')) {
            return false;
        }

        $constructor = new ReflectionMethod($this, 'removeRow');
        $attributes = $constructor->getAttributes(Access::class);

        throw_if(empty($attributes), 'You must add the `Access` attribute to `removeRow` method');

        foreach ($attributes as $attribute) {
            if (!Permission::verify($attribute->getArguments()[0])) {
                return false;
            }
        }

        return true;
    }
}
