<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaIntegracaoTest extends TestCase
{
    use RefreshDataBase;
    public function test_criar_tarefa_por_meio_da_api()
    {
        $response = $this->postJson('/api/tarefas', [
            'titulo' => 'Nova Tarefa',
            'descricao' => 'Descrição da nova tarefa',
            'concluida' => true,
        ]);
        $response->assertStatus(201)
            ->assertJson([
                'titulo' => 'Nova Tarefa',
                'descricao' => 'Descrição da nova tarefa',
                'concluida' => true,
            ]);
    }

    public function test_criar_tarefa_validar_request()
    {
        $response = $this->postJson ('/api/tarefas', [
            'descricao' => 'Descrição da nova tarefa',
            'concluida' => false,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['titulo']);
    }
}
