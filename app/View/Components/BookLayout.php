<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controllers\LayoutController;

class BookLayout extends Component
{
    public $theLoai;

    public function __construct()
    {
        $this->theLoai = app(LayoutController::class)->getTheLoai();
    }

    public function render()
    {
        return view('components.book-layout', ['theLoai' => $this->theLoai]);
    }
}
