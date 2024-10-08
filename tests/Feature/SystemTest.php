<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_full_tarefa_crud()
    {
        //criar
        $tarefa = Tarefa::create([
            'titulo' => 'Tarefa Teste',
            'descricao' => 'criar uma tarefa de teste',
            'concluida' => false
        ]);
        $this->assertDatabaseHas('tarefas', [
            'titulo' => 'Tarefa Teste'
        ]);
        //assertDatabaseHas: este metodo verifica na nossa tabela se há o campo titulo
        // Read
        $tarefaRecuperada = Tarefa::find($tarefa->id);
        $this->assertEquals('Tarefa Teste', $tarefaRecuperada->titulo);
        $this->assertEquals('criar uma tarefa de teste', $tarefaRecuperada->descricao);

        //update
        $tarefaRecuperada->update([
            'titulo' => 'Tarefa atualizada 100% 2024'
        ]);
        $this->assertEquals('Tarefa atualizada 100% 2024', $tarefaRecuperada->titulo);
        //delete 
        $tarefaRecuperada->delete();
        $this->assertDatabaseMissing('tarefas',['id'=>$tarefaRecuperada->id]);
        //assertDatabaseMissing: verifica se ainda existe o determinado registro

    }
}
