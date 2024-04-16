<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusRegister extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status,
    )
    {/* 
      return view ('components.status-register'); */
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         $color = 'green';
         if($this->status === 'P'){
            $color = 'red';
         }
      /*    $color = $this->status ==='P' ? 'red': $color; */
        return view('components.status-register', compact('textStatus', 'class'));
    }
}
