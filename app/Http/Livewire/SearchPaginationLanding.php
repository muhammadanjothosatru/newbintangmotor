<?php 

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;

class SearchPaginationLanding extends Component
{
    use WithPagination;
    public $searchTerm;
    public $selectedCategory;
    
    public function buttonFilter($value){
        $this->selectedCategory = $value;
    }
    
    public function updatingSelectedCategory(){
        $this->reset();
    }
    public function updatingSearchTerm(){
        $this->gotoPage(1);
    }

    public function mount()
    {
        $this->selectedCategory = "Semua";
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $selectedCategory = '%'.$this->selectedCategory.'%';

        $category = array('Semua', 'Sepeda Motor', 'Mobil');
        $icon = array('fa-border-all', 'fa-motorcycle', 'fa-car');

        $itemCategory = new Collection();
        foreach($category as $key){
            $state = "";
            if($selectedCategory == '%'.$key.'%'){
                $state = "active";
            }
            $itemCategory->push((object)[
                "kategori"=>$key,
                "icon"=>$icon[array_search($key, $category)],
                "state"=>$state
            ]);
        };

        if($selectedCategory == '%Semua%'){
            $selectedCategory = '%%';
        }

        $itemjual =DB::table('foto_landing')
                ->join('kendaraan','kendaraan.no_pol', '=', 'foto_landing.no_pol')
                ->select('foto_landing.id', 'kendaraan.jenis', 'foto_landing.dp', 'kendaraan.no_pol', DB::Raw("CONCAT(merk, ' ' , tipe, ' ', tahun_pembuatan) AS judul"), 'harga_jual', 'foto', 'deskripsi')
                ->where('kendaraan.jenis', 'like', "%$selectedCategory")
                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                ->having('judul','LIKE', "%$searchTerm");
        $items = $itemjual->get();

        $newitems = new Collection();
        foreach($items as $key){
            $fotos = explode(";", $key->foto);
            
            $newitems->push((object)[
                "id"=>$key->id,
                "no_pol"=>$key->no_pol,
                "dp"=>$key->dp,
                "judul"=>$key->judul,
                "jenis"=>$key->jenis,
                "foto"=>$fotos,
                "harga_jual"=>$key->harga_jual,
                "deskripsi"=>$key->deskripsi
            ]);
        };
        
        $newitems = $newitems->paginate(16);

        return view('livewire.search-pagination-landing', ['newitems' => $newitems], ['itemCategory' => $itemCategory]);
    }
}
