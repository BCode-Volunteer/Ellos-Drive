<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = (object) $this->resource;
        return [
            'nome' => $data->produto->nome,
            'descricao' => $data->produto->descricao,
            'preco' => $data->produto->preco,
            'categoria' => $data->categoria,
            'imagens' => $data->imagens,
        ];
    }
}
