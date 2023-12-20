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
     * @return object
     */
    public function verifyEmail($id, $hash);


    /**
     * Change password
     */
    public function changePassword(array $data);

    public function singleSignOnIpaymu($data);

    public function test();
}