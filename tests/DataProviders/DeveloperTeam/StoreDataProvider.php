<?php

namespace Tests\DataProviders\DeveloperTeam;

trait StoreDataProvider
{
    public function getDataProvider(): array
    {
        return [
            'developer is required' => [
                'field' => 'developer',
                'error' => 'The developer field is required.',
                'request' => array_merge($this->request(), [
                    'developer' => null,
                ])
            ],
            'developer is not numeric' => [
                'field' => 'developer',
                'error' => 'The developer must be a number.',
                'request' => array_merge($this->request(), [
                    'developer' => 'abc',
                ])
            ],
            'developer does not exists' => [
                'field' => 'developer',
                'error' => 'The selected developer is invalid.',
                'request' => array_merge($this->request(), [
                    'developer' => 2,
                ])
            ],
            'team is required' => [
                'field' => 'team',
                'error' => 'The team field is required.',
                'request' => array_merge($this->request(), [
                    'team' => null,
                ])
            ],
            'team is not numeric' => [
                'field' => 'team',
                'error' => 'The team must be a number.',
                'request' => array_merge($this->request(), [
                    'team' => 'abc',
                ])
            ],
            'team does not exists' => [
                'field' => 'team',
                'error' => 'The selected team is invalid.',
                'request' => array_merge($this->request(), [
                    'team' => 2,
                ])
            ],
        ];
    }

    private function request(): array
    {
        return [
            'team' => 1,
            'developer' => 1,
        ];
    }
}
