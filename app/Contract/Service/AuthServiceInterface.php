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
    public function verifyUrl($id, $hash);

    /**
     * Update a model
     * @param string $password
     * @return void
     */
    public function verifyConfirmation($password);

    public function test();
}