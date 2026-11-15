<?php

namespace App\View\Components;

use App\Enums\UnitStatus;
use App\Models\Item;
use App\Models\ItemUnit;
use App\Models\Loan;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest', [
            'stats' => [
                ['Alat terdaftar', Item::count()],
                ['Unit siap dipinjam', ItemUnit::query()->where('status', UnitStatus::Available->value)->count()],
                ['Peminjaman tercatat', Loan::count()],
            ],
        ]);
    }
}
