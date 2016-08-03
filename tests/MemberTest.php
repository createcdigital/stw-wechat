<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withSession(['wechat_user' => array('id'=>'sssssss')])
            ->visit('/')
            ->click('Member Center')
            ->seePageIs('/member/register');
    }
}
