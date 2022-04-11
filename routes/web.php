<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadableController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\MootaController;
use App\Http\Controllers\PaymentPageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SppPaymentBankController;
use App\Http\Controllers\SppPaymentController;

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

Route::middleware(['guest'])->group(function ()
{
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});


Route::middleware(['auth'])->group(function ()
{

	// Home
	Route::get('/', [ResourceController::class, 'index'])->name('resource');

	// Resource
	Route::get('/resource/{slug}', [ResourceController::class, 'detail'])->name('resource.detail');

	// Payment
	Route::get('/payment', [PaymentPageController::class, 'index'])->name('payment');
	Route::post('/payment/store', [PaymentPageController::class, 'store'])->name('payment.store');

	// Spp Payment
	Route::get('/spp-payment/{id}', [PaymentPageController::class, 'sppPayment'])->name('spp-payment');
	Route::post('/payment/store', [PaymentPageController::class, 'sppPaymentStore'])->name('spp-payment.store');
	Route::get('/spp-payment-detail/{id}', [PaymentPageController::class, 'sppPaymentDetail'])->name('spp-payment-detail');
	Route::get('/spp-payment-success', [PaymentPageController::class, 'sppPaymentSuccess'])->name('spp-payment-success');

	// api notif push webhoox
	Route::get('/notification-payment-bank/success', [SppPaymentBankController::class, 'index'])->name('cek-notif-transfer');

	// Watch Material
	Route::get('/watch/{id}', [WatchController::class, 'index'])->name('watch');
	Route::get('/exercise/{id}', [WatchController::class, 'exercise'])->name('exercise');
	Route::get('/downloadable/{id}', [WatchController::class, 'downloadable'])->name('downloadable');

	// Score
	Route::get('/score', [WatchController::class, 'score'])->name('score');

	// Logout
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

	// Dashboard Student
	Route::get('/dashboard-student', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');

	Route::prefix('admin')->group(function () {

		// Dashboard
		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

		// Score
		Route::get('/score/all', [ExerciseController::class, 'score_all'])->name('score.all');
		Route::delete('/delete/{id}', [ExerciseController::class, 'score_delete'])->name('score.delete');

		// Moota
		Route::get('/moota/setting', [MootaController::class, 'create'])->name('moota');
		Route::post('moota/create', [MootaController::class, 'store'])->name('moota.store');
		Route::get('/moota/get-bank', [MootaController::class, 'getListBank'])->name('moota.get-bank');


		Route::prefix('user')->group(function () {
				Route::get('/all', [UserController::class, 'index'])->name('user.all');
				Route::get('/create', [UserController::class, 'create'])->name('user.create');
				Route::post('/create', [UserController::class, 'store'])->name('user.store');
				Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
				Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
				Route::post('/edit/{id}', [UserController::class, 'update'])->name('user.update');
				Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
				Route::get('template-user', [UserController::class, 'template'])->name('template.user');
				Route::post('file-import-user', [UserController::class, 'fileImport'])->name('file-import-user');
				Route::get('/reset', [UserController::class, 'filterReset'])->name('user.reset');
				Route::get('/enroll/{id}', [LevelUserController::class, 'enroll'])->name('user.enroll');
				Route::post('/enroll/store', [LevelUserController::class, 'store'])->name('enroll.store');
				Route::post('/enroll/delete', [LevelUserController::class, 'delete'])->name('enroll.delete');
				Route::get('/manyEnroll', [LevelUserController::class, 'manyEnroll'])->name('manyEnroll');
				Route::post('/manyEnroll/store', [LevelUserController::class, 'manyEnrollStore'])->name('manyEnroll.store');
		});

		Route::prefix('program')->group(function () {
				Route::get('/all', [ProgramController::class, 'index'])->name('program.all');
				Route::get('/create', [ProgramController::class, 'create'])->name('program.create');
				Route::post('/create', [ProgramController::class, 'store'])->name('program.store');
				Route::get('/show/{id}', [ProgramController::class, 'show'])->name('program.show');
				Route::get('/edit/{id}', [ProgramController::class, 'edit'])->name('program.edit');
				Route::post('/edit/{id}', [ProgramController::class, 'update'])->name('program.update');
				Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])->name('program.delete');
		});

		Route::prefix('level')->group(function () {
				Route::get('/create/{id}', [LevelController::class, 'create'])->name('level.create');
				Route::post('/create', [LevelController::class, 'store'])->name('level.store');
				Route::get('/show/{id}', [LevelController::class, 'show'])->name('level.show');
				Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
				Route::post('/edit/{id}', [LevelController::class, 'update'])->name('level.update');
				Route::delete('/delete/{id}', [LevelController::class, 'destroy'])->name('level.delete');
		});

		Route::prefix('lesson')->group(function () {
				Route::get('/create/{id}', [LessonController::class, 'create'])->name('lesson.create');
				Route::post('/create', [LessonController::class, 'store'])->name('lesson.store');
				Route::get('/show/{id}', [LessonController::class, 'show'])->name('lesson.show');
				Route::get('/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');
				Route::post('/edit/{id}', [LessonController::class, 'update'])->name('lesson.update');
				Route::delete('/delete/{id}', [LessonController::class, 'destroy'])->name('lesson.delete');
		});

		Route::prefix('material')->group(function () {
				Route::get('/create/{id}', [MaterialController::class, 'create'])->name('material.create');
				Route::post('/create', [MaterialController::class, 'store'])->name('material.store');
				Route::get('/show/{id}', [MaterialController::class, 'show'])->name('material.show');
				Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('material.edit');
				Route::post('/edit/{id}', [MaterialController::class, 'update'])->name('material.update');
				Route::delete('/delete/{id}', [MaterialController::class, 'destroy'])->name('material.delete');
		});

		Route::prefix('payment')->group(function () {
				Route::get('/all', [PaymentController::class, 'index'])->name('payment.all');
				Route::get('/create', [PaymentController::class, 'create'])->name('payment.create');
				Route::post('/create', [PaymentController::class, 'store'])->name('payment.store');
				Route::get('/show/{id}', [PaymentController::class, 'show'])->name('payment.show');
				Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
				Route::post('/edit/{id}', [PaymentController::class, 'update'])->name('payment.update');
				Route::delete('/delete/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');
		});

		Route::prefix('recipient')->group(function () {
				Route::get('/all', [RecipientController::class, 'index'])->name('recipient.all');
				Route::get('/create', [RecipientController::class, 'create'])->name('recipient.create');
				Route::post('/create', [RecipientController::class, 'store'])->name('recipient.store');
				Route::get('/edit/{id}', [RecipientController::class, 'edit'])->name('recipient.edit');
				Route::post('/edit/{id}', [RecipientController::class, 'update'])->name('recipient.update');
				Route::delete('/delete/{id}', [RecipientController::class, 'destroy'])->name('recipient.delete');
		});

		Route::prefix('downloadable')->group(function () {
				Route::get('/all', [DownloadableController::class, 'index'])->name('downloadable.all');
				Route::get('/create{id}', [DownloadableController::class, 'create'])->name('downloadable.create');
				Route::post('/create', [DownloadableController::class, 'store'])->name('downloadable.store');
				Route::get('/show/{id}', [DownloadableController::class, 'show'])->name('downloadable.show');
				Route::get('/edit/{id}', [DownloadableController::class, 'edit'])->name('downloadable.edit');
				Route::post('/edit/{id}', [DownloadableController::class, 'update'])->name('downloadable.update');
				Route::delete('/delete/{id}', [DownloadableController::class, 'destroy'])->name('downloadable.delete');
		});

		Route::prefix('exercise')->group(function () {
				Route::get('/all', [ExerciseController::class, 'index'])->name('exercise.all');
				Route::get('/create{id}', [ExerciseController::class, 'create'])->name('exercise.create');
				Route::post('/create', [ExerciseController::class, 'store'])->name('exercise.store');
				Route::get('/show/{id}', [ExerciseController::class, 'show'])->name('exercise.show');
				Route::get('/edit/{id}', [ExerciseController::class, 'edit'])->name('exercise.edit');
				Route::post('/edit/{id}', [ExerciseController::class, 'update'])->name('exercise.update');
				Route::delete('/delete/{id}', [ExerciseController::class, 'destroy'])->name('exercise.delete');
				Route::post('/score/{id}', [ExerciseController::class, 'score'])->name('score.store');
		});

		Route::prefix('question')->group(function () {
				Route::get('/create/{id}', [QuestionController::class, 'create'])->name('question.create');
				Route::post('/create', [QuestionController::class, 'store'])->name('question.store');
				Route::get('/show/{id}', [QuestionController::class, 'show'])->name('question.show');
				Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
				Route::post('/edit/{id}', [QuestionController::class, 'update'])->name('question.update');
				Route::delete('/delete/{id}', [QuestionController::class, 'destroy'])->name('question.delete');
		});

		Route::prefix('spp')->group(function () {
			Route::get('/all', [SppController::class, 'index'])->name('spp.all');
			Route::get('/create', [SppController::class, 'create'])->name('spp.create');
			Route::post('/store', [SppController::class, 'store'])->name('spp.store');
			Route::get('/show/{id}', [SppController::class, 'show'])->name('spp.show');
			Route::get('/edit/{id}', [SppController::class, 'edit'])->name('spp.edit');
			Route::post('/update/{id}', [SppController::class, 'update'])->name('spp.update');
			Route::delete('/delete/{id}', [SppController::class, 'destroy'])->name('spp.delete');
		});

	});

});
