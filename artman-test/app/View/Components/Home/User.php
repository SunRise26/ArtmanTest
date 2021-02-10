<?php

namespace App\View\Components\Home;

use App\Models\User as ModelsUser;
use Illuminate\View\Component;

class User extends Component
{
    public ModelsUser $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsUser $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home.user');
    }
}
