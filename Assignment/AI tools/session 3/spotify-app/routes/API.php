use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TestOpenAIController;

use App\Http\Controllers\PlaylistAIController;

Route::post('/playlist/generate-summary', [PlaylistAIController::class, 'generatePlaylistDescription']);

Route::get('/test-openai', [TestOpenAIController::class, 'testInstall']);



Route::post('/playlist/add-song', [PlaylistController::class, 'addSong']);

Route::post('/products', [ProductController::class, 'create']);
Route::get('/products', [ProductController::class, 'read']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
Route::get('/ipl/upcoming', [MatchController::class, 'getUpcomingMatches']);