<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Obelaw\Framework\Facades\Bundles;

abstract class ViewBase extends Component
{
    use WithPagination;

    protected $pretitle = 'Pre Title';
    protected $title = 'Title';
    protected $paginationTheme = 'bootstrap';

    protected $parameters = null;

    private $view = null;

    public function boot()
    {
        $view = Bundles::getViews($this->viewId);

        $this->view = $view['tabs'];
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
        return view('obelaw::builder.build.view', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
            'tabs' => array_keys($this->view),
            'components' => $this->view,
            'parameters' => $this->parameters,
        ])->layout($this->layout());
    }

    protected function parameters(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    protected function layout()
    {
        //
    }
}
