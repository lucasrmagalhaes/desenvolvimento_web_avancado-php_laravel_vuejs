<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    public function run()
    {
        MotivoContato::create([ 'motivo_contato' => 'Dúvida' ]);
        MotivoContato::create([ 'motivo_contato' => 'Elogio' ]);
        MotivoContato::create([ 'motivo_contato' => 'Reclamação' ]);
    }
}
