<?php

namespace web3tc\EchangeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testPays()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pays');
    }

}
