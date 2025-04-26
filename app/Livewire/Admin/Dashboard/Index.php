<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\BlotterRecord;
use App\Models\CertificateRequest;
use App\Models\Resident;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $residentCount = 0;
    public $certificateRequestCount = 0;
    public $certificateReleasedCount = 0;
    public $blotterCount = 0;

    public function mount() {}

    public function render()
    {
        return view('livewire.admin.dashboard.index');
    }
}
