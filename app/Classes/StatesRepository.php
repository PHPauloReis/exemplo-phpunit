<?php

namespace Unidev\Classes;

use Unidev\Services\BrazilianStatesService;

class StatesRepository
{
    protected $service;

    public function __construct(BrazilianStatesService $service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        $states = $this->service->getAll();
        return array_map(function ($state) {
            return [
                "id" => $state['id'],
                "uf" => $state['sigla']
            ];
        }, $states);
    }

    public function getById($id)
    {
        $states = $this->getAll();
        $selectedState = [];

        array_map(function($state) use ($id, &$selectedState) {
            if ($state['id'] === $id) {
                $selectedState = $state;
            }
        }, $states);

        return $selectedState;
    }
}