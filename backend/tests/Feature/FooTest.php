<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Foo;

class FooTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function 登録することができる()
    {
        $data = [
             'title'=> 'tin',
             'body' => 'hageko'
        ];
        $response = $this -> postJson('api/foos', $data);
        $response->json();
        $response
            ->assertStatus(201)
            ->assertJsonFragment($data);
    }

    /**
     * 一覧取得テスト
     *
     * @test
     * @return void
     */
    public function 一覧を取得できる()
    {
        $foos = Foo::factory()->count(10)->create();

        $response = $this->getJson('api/foos');
        $response
            ->assertOk()
            ->assertJsonCount($foos->count());
    }


    /**
     * 更新テスト
     * @test
     * @return void
     */
    public function 更新することができる()
    {
        $foo =FOO::factory()->create();

        $foo->title = '書き換え';


        $response = $this->patchJson("api/foos/{$foo->id}", $foo->toArray());

        $response
            ->assertOk()
            ->assertJsonFragment($foo->toArray());
    }

    /**
     * 削除テスト
     * @test
     * @return void
     */
    public function 削除することができる()
    {
        $foo =FOO::factory()->count(10)->create();

        $response = $this->deleteJson("api/foos/13");
        $response->assertOk();

        $response = $this->getJson("api/foos");
        $response->assertJsonCount($foo->count()-1);
    }

    /**
     * テスト
     * @test
     * @return void
     */
    public function タイトルがからの場合は登録できない()
    {
        $data = [
             'title'=> '',
             'body' => 'hageko'
        ];
        $response = $this -> postJson('api/foos', $data);
        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['title'=>'タイトルは、必ず指定してください。']);
    }

    /**
    * テスト
    * @test
    * @return void
    */
    public function タイトルが255文字のときは登録できない()
    {
        $data = [
             'title'=> str_repeat('あ', 256),
             'body' => 'hageko'
        ];
        $response = $this -> postJson('api/foos', $data);
        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(['title'=>'タイトルは、255文字以下にしてください。']);
    }
}
