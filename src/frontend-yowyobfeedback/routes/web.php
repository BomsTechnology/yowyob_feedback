<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AchievementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $achievements = Http::get('http://localhost:8080/api/achievements')->object();
    $feedbacks = Http::get('http://localhost:8080/api/feedbacks')->object();
    $members = Http::get('http://localhost:8080/api/members')->object();
    return view('front-office.home', [
        'achievements' => $achievements,
        'feedbacks' => $feedbacks,
        'members' => $members
    ]);
})->name('home');

Route::get('/login', function () {
    return view('back-office.mylogin');
})->name('mylogin');
Route::post('/auth', [MemberController::class, 'login'])->name('members.login');
Route::get('/logout', [MemberController::class, 'logout'])->name('members.logout');
Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');

Route::group(['middleware' => 'mylogin'], function () {

    Route::get('/settings', [MemberController::class, 'settings'])->name('settings');
    Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');

    Route::group(['middleware' => 'changepassword'], function () {

        Route::get('/admin', [MemberController::class, 'dashboard'])->name('dashboard');

        Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
        Route::post('/achievements', [AchievementController::class, 'create'])->name('achievements.create');
        Route::put('/achievements/{id}', [AchievementController::class, 'update'])->name('achievements.update');
        Route::get('/achievement-valid/{id}', [AchievementController::class, 'valid'])->name('achievement.valid');
        Route::get('/achievement-novalid/{id}', [AchievementController::class, 'novalid'])->name('achievement.novalid');
        Route::get('/achievement-delete/{id}', [AchievementController::class, 'delete'])->name('achievement.delete');

        Route::get('/members', [MemberController::class, 'index'])->name('members.index');
        Route::post('/members', [MemberController::class, 'create'])->name('members.create');
        Route::get('/member-admin/{id}', [MemberController::class, 'admin'])->name('member.admin');
        Route::get('/member-noadmin/{id}', [MemberController::class, 'noadmin'])->name('member.noadmin');
        Route::get('/member-delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/feedback-valid/{id}', [FeedbackController::class, 'valid'])->name('feedback.valid');
        Route::get('/feedback-novalid/{id}', [FeedbackController::class, 'novalid'])->name('feedback.novalid');
        Route::get('/feedback-delete/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete');
        Route::get('/feedback-waiting/{id}', [FeedbackController::class, 'waiting'])->name('feedback.waiting');
    });
});
