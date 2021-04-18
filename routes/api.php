<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');
// ログイン
Route::post('/login', 'Auth\LoginController@login')->name('login');
// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// ログインユーザー
Route::get('/user', function ()
{
    return Auth::user();
})->name('user');

// 管理者用
Route::get('admin/quiz', 'api\admin\AdminQuizController@handle')->name('AdminQuiz');
// 問題作成
Route::get('admin/quiz/create', 'api\admin\CreateQuizController@getHandle')->name('getCreateQuiz');
Route::post('admin/quiz/create', 'api\admin\CreateQuizController@handle')->name('createQuiz');
// 問題編集
Route::post('admin/quiz/edit', 'api\admin\EditQuizController@handle')->name('editQuiz');
// 問題削除
Route::post('admin/quiz/delete', 'api\admin\DeleteQuizController@handle')->name('deleteQuiz');




// ユーザー用
// 問題取得
Route::post('/quiz', 'api\Quiz\QuizGetController@handle')->name('quiz');

// 問題難易度用データ保存
Route::post('/quiz/result', 'api\Quiz\QuizResultPostController@handle')->name('quizResult');
