<?php

namespace App\Contract\Service;


interface AuthServiceInterface
{
    /**
     * Register User
     * @param array $data
     * @return object
     */
    public function register(array $data);

    /**
     * Update a model
     * @param string $id
     * @param string $hash
     * @return void
     */
    public function verifyEmail($id, $hash);

    public function test();
}