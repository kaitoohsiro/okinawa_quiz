<?php

use Illuminate\Database\Seeder;
use App\model\Question;
use Illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allquiz = [
            $quiz1 = [
                'question' => '沖縄のシーサーは何種類あるでしょうか？',
                'correct' => '3種類',
                'choice1' => '8種類',
                'choice2' => '5種類',
                'explain_sentence' => '正解は宮獅子、村落獅子、家獅子の3種類です。のうち、一番ポピュラーなのは家庭用の家獅子です。',
                'category_id' => '1',
            ],
            $quiz2 = [
                'question' => 'シーサーには性別がありそれを見分けるポイントはどこでしょうか？',
                'correct' => '口',
                'choice1' => '目',
                'choice2' => '歯の本数',
                'explain_sentence' => '正解は口！開いている方がオス、閉じている方がメスとなります。',
                'category_id' => '1',
            ],
            $quiz3 = [
                'question' => '「北谷」なんと読むでしょうか？',
                'correct' => 'ちゃたん',
                'choice1' => 'はいや',
                'choice2' => 'ほくや',
                'explain_sentence' => 'ちゃたんと読みます。',
                'category_id' => '4',
            ],
            $quiz4 = [
                'question' => '「東風平」なんと読むでしょうか？',
                'correct' => 'こちんだ',
                'choice1' => 'ひがしかぜひら',
                'choice2' => 'とんだんへい',
                'explain_sentence' => 'こちんだと読みます',
                'category_id' => '4',
            ],
            $quiz5 = [
                'question' => '「南風原」なんと読むでしょうか？',
                'correct' => 'はえばる',
                'choice1' => 'はいさい',
                'choice2' => 'わっしょい',
                'explain_sentence' => 'はえばると読みます',
                'category_id' => '4',
            ],
            $quiz6 = [
                'question' => '「塩」を方言でなんて言うでしょうか？',
                'correct' => 'まーす',
                'choice1' => 'シーラー',
                'choice2' => 'あきさみよー',
                'explain_sentence' => '塩はまーすといいます。',
                'category_id' => '3',
            ],
            $quiz7 = [
                'question' => '「ありがとう」を方言でなんて言うでしょうか？',
                'correct' => 'にふぇーでーびる',
                'choice1' => 'わっしょい',
                'choice2' => 'がんじゅー',
                'explain_sentence' => '「御拝（にふぇー）＝ありがとう」に「でーびる＝ございます」です。',
                'category_id' => '3',
            ],
            $quiz8 = [
                'question' => '沖縄のある一部の川でつれる魚はなんでしょう',
                'correct' => 'サメ',
                'choice1' => '鯨',
                'choice2' => '靴下',
                'explain_sentence' => 'サメがつれまーす。よい子は釣らないでね！危険です。',
                'category_id' => '2',
            ],
        ];
        foreach ($allquiz as $quiz) {
            DB::table('question')->insert($quiz);
        }


    }
}
