<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @author Henry Paradiz <henry.paradiz@gmail.com>
 */
class DifferenceTest extends TestCase
{
    /**
     * Check URL
     *
     * @return void
     */
    public function test_difference()
    {
        $response = $this->get('/difference/0');

        $response->assertStatus(500);

        $response = $this->get('/difference/5');

        $x = json_decode($response->baseResponse->content());

        $this->assertEquals(170,$x->value);
        $this->assertEquals(5,$x->number);

        $response->assertStatus(200);

        $response = $this->get('/difference/101');
        $response->assertStatus(500);
    }

    public function test_increment()
    {
        $response = $this->get('/difference/5');
        $data = json_decode($response->baseResponse->content());
        $expected = $data->occurrences+1;

        $response = $this->get('/difference/5');
        $data = json_decode($response->baseResponse->content());
        $this->assertEquals($expected,$data->occurrences);
    }

    public function test_datetime()
    {
        $time = time();
        $response = $this->get('/difference/5');
        $data = json_decode($response->baseResponse->content());
        $this->assertGreaterThanOrEqual($time,strtotime($data->datetime));
    }
}
