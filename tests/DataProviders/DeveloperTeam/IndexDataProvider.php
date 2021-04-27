<?php


namespace Tests\DataProviders\DeveloperTeam;


Trait IndexDataProvider
{
    public function getDataProvider(): array
    {
        return [
            'team is required' => [
                'field' => 'team',
                'error' => 'The team field is required.'
            ],
            'team is not numeric' => [
                'field' => 'team',
                'error' => 'The team must be a number.',
                'team' => 'abc'
            ],
            'team does not exists' => [
                'field' => 'team',
                'error' => 'The selected team is invalid.',
                'team' => 5
            ]
        ];
    }
}
