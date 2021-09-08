<?php

namespace Unidev\Tests;

use PHPUnit\Framework\TestCase;
use Unidev\Classes\StatesRepository;
use Unidev\Services\BrazilianStatesService;

class BrazilianStatesServiceTest extends TestCase
{
    // /**
    //  * @dataProvider statesProvider
    //  */
    // public function testShouldGetStateById($id, $uf)
    // {
    //     $expected = ["id" => $id, "uf" => $uf];

    //     $brazilianStatesService = new BrazilianStatesService();
    //     $statesRepository = new StatesRepository($brazilianStatesService);

    //     $this->assertEquals($expected, $statesRepository->getById($id));
    // }

    /**
     * @dataProvider statesProvider
     */
    public function testShouldGetStateById($id, $uf)
    {
        $expected = ["id" => $id, "uf" => $uf];

        $brazilianStatesService = $this->createMock(BrazilianStatesService::class);
        $brazilianStatesService->method('getAll')->willReturn(
            [
                ["id" => 11, "sigla" => "RO"], 
                ["id" => 12, "sigla" => "AC"], 
                ["id" => 13, "sigla" => "AM"], 
                ["id" => 14, "sigla" => "RR"], 
                ["id" => 15, "sigla" => "PA"], 
                ["id" => 16, "sigla" => "AP"], 
                ["id" => 17, "sigla" => "TO"], 
                ["id" => 21, "sigla" => "MA"], 
                ["id" => 22, "sigla" => "PI"], 
                ["id" => 23, "sigla" => "CE"], 
                ["id" => 24, "sigla" => "RN"], 
                ["id" => 25, "sigla" => "PB"], 
                ["id" => 26, "sigla" => "PE"], 
                ["id" => 27, "sigla" => "AL"], 
                ["id" => 28, "sigla" => "SE"], 
                ["id" => 29, "sigla" => "BA"], 
                ["id" => 31, "sigla" => "MG"], 
                ["id" => 32, "sigla" => "ES"], 
                ["id" => 33, "sigla" => "RJ"], 
                ["id" => 35, "sigla" => "SP"], 
                ["id" => 41, "sigla" => "PR"], 
                ["id" => 42, "sigla" => "SC"], 
                ["id" => 43, "sigla" => "RS"], 
                ["id" => 50, "sigla" => "MS"], 
                ["id" => 51, "sigla" => "MT"], 
                ["id" => 52, "sigla" => "GO"], 
                ["id" => 53, "sigla" => "DF"] 
            ]
        );

        $statesRepository = new StatesRepository($brazilianStatesService);

        $this->assertEquals($expected, $statesRepository->getById($id));
    }

    public function statesProvider()
    {
        return [
            ["id" => 17, "uf" => "TO"],
            ["id" => 11, "uf" => "RO"],
            ["id" => 27, "uf" => "AL"]
        ];
    }
}