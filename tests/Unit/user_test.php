<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class user_test extends TestCase
{
    /**
     * Testa se o model User tem os atributos fillable esperados.
     *
     * @return void
     */
    public function test_modelo_user_tem_atributos_fillable_esperados()
    {
        $user = new User();

        $expected = [
            'name',
            'email',
            'password',
        ];

        $this->assertEquals($expected, $user->getFillable());
    }
}
