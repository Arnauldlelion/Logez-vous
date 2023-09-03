<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $url;
    public $id;
    public $content;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $url, $content = "Are you sure you want to delete this item?")
    {
        $this->id = $id;
        $this->url = $url;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.delete-modal');
    }
}
