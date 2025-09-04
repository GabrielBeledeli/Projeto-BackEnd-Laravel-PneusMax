<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especificacoes extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * A tabela associada a este model.
     *
     * @var string
     */
    protected $table = 'especificacoes';

    /**
     * A chave primária para o model.
     *
     * @var string
     */
    protected $primaryKey = 'id_especificacao';

    /**
     * Indica se o model deve ter timestamps (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'largura',
        'perfil',
        'indice_peso',
        'indice_velocidade',
        'tipo_construcao',
        'tipo_terreno',
        'desenho',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'largura' => 'integer',
    ];

    /**
     * Define o relacionamento: uma Especificação TEM UM Pneu.
     */
    public function pneu(): HasOne
    {
        return $this->hasOne(Pneus::class, 'id_especificacao', 'id_especificacao');
    }
}