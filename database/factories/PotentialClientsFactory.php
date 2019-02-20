<?php

use Faker\Generator as Faker;

$factory->define(App\PotentialClients::class, function (Faker $faker) {
    return [
        'cnpj' => str_random(10),
        'incricao_estatudal' => str_random(9),
        'razao_social' => str_random(40),
        'nome_fantasia' => str_random(40),
        'nome_responsavel' => $faker->name,
        'telefone' => mt_rand(10000000000, 20000000000),
        'email_principal' => $faker->unique()->safeEmail,
        'celular' => mt_rand(10000000000, 20000000000),
        'cep'=> str_random(14),
        'cidade'=> str_random(32),
        'bairro'=> str_random(13),
        'estado'=> str_random(2),
        'pais'=> str_random(10),
        'logradouro'=> str_random(30),
        'numero'=> mt_rand(400, 800),
        'status'=> 1,
        'spc'=> 1,
        'cerasa'=> 1,
        'fonte'=> 'receita',
    ];
});
