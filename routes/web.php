<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\association\AssociationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PaiymentController;
use App\Http\Controllers\association\PublicationController;
use App\Http\Controllers\association\EventController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/contact',function(){
    return view('contact');
})->name('contact');
Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/associations', AssociationController::class);
Route::get('/associations/{id}', [AssociationController::class, 'show'])->name('associations.show');
Route::put('/associations/{id}/updateImageConverture',[AssociationController::class,'updateCouverture'])->name('association.updateCouverture');
Route::get('/associations/{id}/dashboard', [AssociationController::class, 'dashboard'])->name('associations.dashboard');

Route::resource('/donateurs', DonationController::class);


Route::get('/Conversation/create/{association}', [ChatController::class, 'create'])->name('Conversation.create');

Route::get('/Conversation/{conversation}', [ChatController::class, 'show'])->name('chat');

Route::post('/Conversation/send/{conversation}', [ChatController::class, 'store'])->name('Conversation.store');
Route::get('/Conversation', [ChatController::class, 'index'])->name('Conversation.index');
Route::get('/Conversation/{conversation}', [ChatController::class, 'show'])->name('Conversation.show');
// web.php

Route::post('/Coversation/{conversation}/mark-read', [ChatController::class, 'markAsRead'])->name('Conversation.markAsRead');

Route::post('/paiement/intent', [PaiymentController::class, 'createPaymentIntent'])->name('stripe.create.intent');
Route::post('/paiement/store', [PaiymentController::class, 'store'])->name('paiyment.store');
Route::get('/paiement/success', function () {
    return view('paiement.success');
})->name('payment.success');







Route::resource('/Publications', PublicationController::class);

Route::resource('/events', EventController::class);


Route::get('/paiyment/create/{id}', [PaiymentController::class, 'create'])->name('paiyment.create');
Route::post('/paiyment/store', [PaiymentController::class, 'store'])->name('paiyment.store');





require __DIR__.'/auth.php';
