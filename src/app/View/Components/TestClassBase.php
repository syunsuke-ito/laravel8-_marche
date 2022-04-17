<?php declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;

class TestClassBase extends Component
{
    public $classBaseMessage;
    public $defaultMessage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($classBaseMessage, $defaultMessage="初期値です")
    {
        $this->classBaseMessage = $classBaseMessage;
        $this->defaultMessage = $defaultMessage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|Closure|string
     */
    public function render()
    {
        return view('components.tests.test-class-base-component');
    }
}
