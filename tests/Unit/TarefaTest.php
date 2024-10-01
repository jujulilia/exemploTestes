<?php

namespace Tests\Unit;

use App\Models\Tarefa;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    public function test_criar_tarefa_de_teste()
    {
        $tarefa = Tarefa::create([
            'titulo' => 'Tarefa Teste',
            'descricao' => 'criar uma tarefa de teste',
            'concluida' => false
        ]);

        $this->assertEquals('Tarefa Teste', $tarefa->titulo);
        $this->assertEquals('criar uma tarefa de teste', $tarefa->descricao);
        $this->assertFalse($tarefa->concluida);
    }
}
