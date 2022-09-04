<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    public $title;
    public $route;
    public $icon;
    public $routeParam;
    public $ul;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $route
     * @param $icon
     */
    public function __construct($title, $icon, $route = null, $routeParam = [], $ul)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->route = $route;
        $this->routeParam = $routeParam;
        $this->ul = $ul;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar-item');
    }
}
