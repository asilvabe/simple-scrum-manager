<?php


namespace Tests\DataProviders\Developer;


use App\Enums\DeveloperLevels;

trait StoreOrUpdaterDataProvider
{
    public function getDataProvider(): array
    {
        return [
            'empty name' => [
                'name',
                array_merge($this->developerData(), ['name' => ''])
            ],
            'name too short' => [
                'name',
                array_merge($this->developerData(), ['name' => 'a'])
            ],
            'name too long' => [
                'name',
                array_merge($this->developerData(), ['name' => str_repeat('test name', 151)])
            ],
            'empty email' => [
                'email', array_merge($this->developerData(), ['email' => ''])
            ],
            'not email format' => [
                'email', array_merge($this->developerData(), ['email' => 'test'])
            ],
            'email too long' => [
                'email', array_merge($this->developerData(), ['email' => str_repeat('test', 120) . '@test.com'])
            ],
            'empty level' => [
                'level', array_merge($this->developerData(), ['level' => ''])
            ],
            'non-existent level' => [
                'level', array_merge($this->developerData(), ['level' => 'developer'])
            ]
        ];
    }

    private function developerData(): array
    {
        return [
            'name' => 'test name',
            'email' => 'test@test.com',
            'level' => DeveloperLevels::JUNIOR
        ];
    }
}
