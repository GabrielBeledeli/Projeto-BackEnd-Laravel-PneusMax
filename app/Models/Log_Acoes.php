<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log_Acoes extends Model
{
    /**
     * A tabela associada a este model.
     *
     * @var string
     */
    protected $table = 'log_acoes';

    /**
     * A chave primária para o model.
     *
     * @var string
     */
    protected $primaryKey = 'id_log';

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
        'id_pneu',
        'id_usuario',
        'acao',
        'data_hora',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_hora' => 'datetime', // Trata o campo como um objeto de data/hora (Carbon)
    ];

    /**
     * Define o relacionamento: um Log PERTENCE A um Pneu.
     */
    public function pneu(): BelongsTo
    {
        return $this->belongsTo(Pneus::class, 'id_pneu', 'id_pneu');
    }

    /**
     * Define o relacionamento: um Log PERTENCE A um Usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}