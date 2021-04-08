<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateQuizApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('/admin/quiz/create', [
            'id' => 2000,
            'question' => 'クイズ問題テスト文',
            'correct' => '正解データ',
            'choice1' => '不正解データ1',
            'choice2' => '不正解データ2',
            'explain_sentence' => 'テスト解説文',
            'image_name' => 'https://test_url.png',
            'category_id' => 1,
            'created_at' => "2020202020",
            'updated_at' => "2020202020",
        ]);


        $response->assertStatus(405);
    }
}
