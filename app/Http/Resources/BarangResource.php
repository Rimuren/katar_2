<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'namaBarang' => $this->namaBarang,
            'stok' => $this->stok,
            'hargaBeli' => $this->hargaBeli,
            'hargaJual' => $this->hargaJual,
            'idmerk' => $this->idmerk,
            'idkategori' => $this->idkategori,
            'merk' => $this->merk->namaMerk,
            'kategori' => $this->kategori->namaKategori,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
