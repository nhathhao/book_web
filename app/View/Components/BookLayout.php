<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\LayoutController;

class BookLayout extends Component
{
    public $theLoai;
    public $showCarousel;
    public $showNavbar;

    public function __construct($showCarousel = true, $showNavbar = true)
    {
        $this->theLoai = app(LayoutController::class)->getTheLoai();
        $this->showCarousel = $showCarousel;
        $this->showNavbar = $showNavbar;
    }

    public function render()
    {
        return view('components.book-layout', [
            'theLoai' => $this->theLoai,
            'showCarousel' => $this->showCarousel,
            'showNavbar' => $this->showNavbar,
        ]);
    }
}
