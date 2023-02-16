<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\File;

class UploadIndex extends Component
{
    use WithPagination;
    public $paginacion = 1;
    public $paginationTheme = 'bootstrap';

    protected $queryString = [
        'paginacion' => ['except' => 1],
    ];

    public function render()
    {
        $upload = $this->consulta();
        $upload = $upload->paginate($this->paginacion);

        if($upload->currentPage() > $upload->lastPage()){
            $this->resetPage();
            $upload = $this->consulta();
            $upload = $upload->paginate($this->paginacion);
        }

        $params = [
            'upload' => $upload,
        ];
        
        return view('livewire.upload-index',$params);
    }

    private function consulta(){
        $query = File::orderByDesc('id');
        return $query;
    }
}
