<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PublicRoutesTest extends TestCase
{
    #[Test]
    public function home_page_is_accessible()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    #[Test]
    public function signin_page_is_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    #[Test]
    public function signup_page_is_accessible()
    {
        $response = $this->get('/signup');
        $response->assertStatus(200);
    }

    #[Test]
    public function login_page_is_accessible()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
