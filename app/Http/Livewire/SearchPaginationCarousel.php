<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Support\Collection;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SearchPaginationCarousel extends Component
{
    use WithPagination;
    public $searchTerm;
    
    public function updatingSearchTerm(){
        $this->reset();
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $carousel =DB::table('carousel')
            ->where('namapromo','like', $searchTerm);
        $carousel = $carousel->paginate(10);
        return view('livewire.search-pagination-carousel', ['carousel' => $carousel]);
    }
}
