<?

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Middleware\EnsureEmailIsNotVerifed;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::controller(RegisterUserController::class)->middleware('guest')->prefix('register')->name('register.')->group(function () {
        Route::get('', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });
});

Route::controller(EmailVerificationController::class)->name('verification.')->group(function () {
    Route::middleware(EnsureEmailIsNotVerifed::class)->group(function() {
        Route::get('verify-email', 'index')->name('notice')->middleware('auth');
        Route::post('verify-email', 'store')->middleware(['throttle:6,1'])->name('send');
    });
    Route::get('verify-email/{id}/{hash}', 'create')->middleware(['signed', 'throttle:6,1', 'auth'])->name('verify');
});
