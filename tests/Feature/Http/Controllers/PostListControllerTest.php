<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostListControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function TOPページでブログ一覧が表示される()
    {
        //create()の中身はなくてもいいがエラー確認時に分かりづらいので、上書きするとよい
        $post1 = Post::factory()->create(['title' => 'ブログのタイトル1']);
        $post2 = Post::factory()->create(['title' => 'ブログのタイトル2']);

        $this->get('/')
            ->assertOK()
            ->assertSee('ブログのタイトル1')
            ->assertSee('ブログのタイトル2')
            ->assertSee($post1->user->name)
            ->assertSee($post2->user->name);
    }

    /** @test */
    function factoryの観察 ()
    {
        $post = Post::factory()->create();
        dump($post->toArray());

        dump(User::get()->toArray());

        $this->assertTrue(true);
    }
}
