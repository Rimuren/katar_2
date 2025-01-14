<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'idPelanggan' => $this->idPelanggan,
            'idStaff' => $this->idStaff,
            'namaTransaksi' => $this->namaTransaksi,
            'tglTransaksi' => $this->tglTransaksi,
            'totalTransaksi' => $this->totalTransaksi,
            'tipeTransaksi' => $this->tipeTransaksi,
            'pelanggan' => new PelangganResource($this->pelanggan),
            'staff' => new StaffResource($this->staff),
        ];
    }
}
