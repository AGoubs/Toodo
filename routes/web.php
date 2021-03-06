<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Course\Create as CourseCreate;
use App\Http\Livewire\Course\Read as CourseRead;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\LaravelExamples\UserManagement;

//Lesson
use App\Http\Livewire\Lesson\Create;
use App\Http\Livewire\Lesson\Lesson;
use App\Http\Livewire\Lesson\Read;
use App\Http\Livewire\Professor\Create as ProfessorCreate;
use App\Http\Livewire\Professor\Read as ProfessorRead;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
// Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', Dashboard::class)->name('dashboard');
  Route::get('/calendar', Calendar::class)->name('calendar');

  Route::get('/lesson/view', Lesson::class)->name('lesson.view');
  Route::get('/lesson/create', Create::class)->name('lesson.create');
  Route::get('/lesson/read', Read::class)->name('lesson.read');

  Route::get('/professor/create', ProfessorCreate::class)->name('professor.create');
  Route::get('/professor/read', ProfessorRead::class)->name('professor.read');

  Route::get('/course/create', CourseCreate::class)->name('course.create');
  Route::get('/course/read', CourseRead::class)->name('course.read');

  Route::get('/billing', Billing::class)->name('billing');
  Route::get('/profile', Profile::class)->name('profile');
  Route::get('/tables', Tables::class)->name('tables');
  Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
  Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
  Route::get('/rtl', Rtl::class)->name('rtl');
  Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});
