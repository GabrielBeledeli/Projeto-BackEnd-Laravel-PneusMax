<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pneus extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * A tabela associada a este model.
     *
     * @var string
     */
    protected $table = 'pneus';

    /**
     * A chave primária para o model.
     *
     * @var string
     */
    protected $primaryKey = 'id_pneu';

    /**
     * Indica se o model deve ter timestamps (created_at, updated_at).
     * Como sua tabela não tem essas colunas, definimos como false.
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
        'marca',
        'modelo',
        'aro',
        'medida',
        'preco',
        'quantidade_estoque',
        'id_especificacao',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'aro' => 'integer',
        'preco' => 'decimal:2', // Trata o preço como decimal com 2 casas
        'quantidade_estoque' => 'integer',
    ];
    /**
     * Define o relacionamento: um Pneu PERTENCE A uma Especificação.
     */
    public function especificacao(): BelongsTo
    {
        return $this->belongsTo(Especificacoes::class, 'id_especificacao', 'id_especificacao');
    }

    /**
     * Define o relacionamento: um Pneu TEM MUITOS Logs de Ações.
     */
    public function logAcoes(): HasMany
    {
        return $this->hasMany(Log_Acoes::class, 'id_pneu', 'id_pneu');
    }
}