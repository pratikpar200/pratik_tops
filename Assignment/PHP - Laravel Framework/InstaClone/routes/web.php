<?php

/**
 * PERFORMANCE OPTIMIZATION NOTES (Session 22 - Task 1)
 * ------------------------------------------------------
 * php artisan config:cache
 *   - Combines all config files (config/*.php) and .env values into
 *     a single cached file (bootstrap/cache/config.php).
 *   - This means Laravel no longer needs to read/parse multiple config
 *     files or the .env file on every request, reducing filesystem I/O
 *     and improving response time, especially on production servers.
 *   - IMPORTANT: Once cached, changes to .env will NOT take effect until
 *     you run 'php artisan config:clear' or 'php artisan config:cache' again.
 *
 * php artisan route:cache
 *   - Compiles all routes (web.php, api.php, auth.php) into a single
 *     optimized file (bootstrap/cache/routes-v7.php).
 *   - This speeds up route registration on every request, since Laravel
 *     doesn't need to re-parse and re-register every Route::get/post/etc.
 *     definition from scratch each time.
 *   - IMPORTANT: If you add/change routes after caching, you MUST run
 *     'php artisan route:cache' again (or 'route:clear') for changes
 *     to reflect - otherwise Laravel will keep using the old cached routes.
 *
 * Together, these commands are typically run during deployment to
 * production to reduce server response time, NOT during active local
 * development (since they require re-running after every change).
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
use App\Notifications\PlaylistLiked;
use App\Models\User;
use App\Mail\PasswordResetMail;
use App\Events\OrderPlaced;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/foodie', function () {
    return 'Welcome to Foodie App';
});

Route::get('/explore', function () {
    return 'Welcome to Explore Page';
});

Route::post('/playlist/add', function () {
    return 'Song added to playlist.';
});

Route::get('/user/{username}', function ($username) {
    return 'Profile of ' . $username;
})->where('username', '[A-Za-z]+');

Route::get('/offers/today', function () {
    return "Today's Offers";
})->name('today.offers');

Route::get('/offers-link', function () {
    return view('offers-link');
});

Route::prefix('settings')->group(function () {
    Route::get('/profile', function () {
        return 'This is the Profile Settings page';
    });

    Route::get('/privacy', function () {
        return 'This is the Privacy Settings page';
    });

    Route::get('/notifications', function () {
        return 'This is the Notifications Settings page';
    });
});

Route::get('/home-page', function () {
    return view('home');
});

Route::get('/playlist/top-songs', [PlaylistController::class, 'showTopSongs']);
Route::get('/playlist-page', function () {
    $songs = [
        'Kesariya',
        'Apna Bana Le',
        'Tum Hi Ho',
        'Raataan Lambiyan',
        'Chaiyya Chaiyya'
    ];

    return view('playlist', ['songs' => $songs]);
});

Route::get('/offer-page', function () {
    $discount = 25;
    return view('offer', ['discount' => $discount]);
});

Route::get('/deals-page', function () {
    return view('deals');
});

Route::get('/playlist/add', function () {
    return view('playlist-add-form');
});

Route::get('/restaurant/add', function () {
    return view('restaurant-add-form');
});

Route::post('/restaurant/store', function (\Illuminate\Http\Request $request) {
    $name = $request->input('name');
    $cuisine = $request->input('cuisine');

    return "Restaurant '{$name}' ({$cuisine}) added successfully!";
});
Route::post('/playlist/store', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|min:3',
    ]);

    $name = $request->input('name');

    return redirect('/playlist/add')->with('success', "'{$name}' Added to Library!");
});
Route::get('/playlists/latest', [PlaylistController::class, 'latestPlaylists']);
Route::get('/playlists/create-demo', [PlaylistController::class, 'createPlaylists']);
Route::get('/playlists/update-demo', [PlaylistController::class, 'updatePlaylistName']);
Route::get('/playlists/delete/{id}', [PlaylistController::class, 'deletePlaylist']);
Route::get('/playlists/{id}/songs', [PlaylistController::class, 'songs']);
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/gallery', [ProfileController::class, 'gallery'])->name('profile.gallery');

Route::middleware(['auth'])->prefix('my-orders')->name('my-orders.')->group(function () {
    Route::get('/', function () {
        return 'Here are your orders.';
    })->name('index');

    Route::get('/track/{id}', function ($id) {
        return 'Tracking order #' . $id;
    })->name('track');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

Route::get('/posts/trending', [PostController::class, 'trending']);

Route::get('/test-mail', function () {
    Mail::raw('This is a test email from InstaClone using Gmail SMTP.', function ($message) {
        $message->to('youremail@gmail.com')
                 ->subject('InstaClone Test Mail');
    });

    return 'Test email sent successfully!';
});

// Simulated signup route - sends WelcomeUserMail
Route::get('/signup-demo', function () {
    $userName = 'Rahul Sharma';

    Mail::to('youremail@gmail.com')->send(new WelcomeUserMail($userName));

    return "Signup simulated! Welcome email sent to {$userName}.";
});

// Simulated playlist like route - triggers PlaylistLiked notification via email
Route::get('/playlist/like-demo', function () {
    $user = User::first();

    if (!$user) {
        return 'No user found in database. Please create a user first.';
    }

    $user->notify(new PlaylistLiked('Bollywood Hits 2025', 'Priya Verma'));

    return 'Playlist liked notification sent to ' . $user->email;
});

// Simulated password reset route - sends PasswordResetMail
Route::get('/password-reset-demo', function () {
    $userName = 'Rahul Sharma';
    $resetLink = url('/reset-password/sample-token-123');

    Mail::to('youremail@gmail.com')->send(new PasswordResetMail($userName, $resetLink));

    return 'Password reset email sent to test user.';
});

// Mock Flipkart-style order placement - dispatches OrderPlaced event
Route::get('/order/place', function () {
    $orderId = rand(1000, 9999);
    $userEmail = 'youremail@gmail.com';

    event(new OrderPlaced($orderId, $userEmail));

    return "Order #{$orderId} placed successfully for {$userEmail}. OrderPlaced event dispatched.";
});

// Blocked page - shown when CheckUserActive middleware blocks an inactive user
Route::get('/blocked', function () {
    return 'Your account has been blocked. Please contact support.';
});

// Demo route protected by CheckUserActive middleware
Route::middleware(['auth', 'active'])->get('/dashboard-demo', function () {
    return 'Welcome! Your account is active, so you can see this page.';
});

// XSS demo - comment box showing vulnerable vs safe output
Route::get('/comment-demo', function (\Illuminate\Http\Request $request) {
    $rawComment = $request->query('comment');

    return view('comment-demo', ['rawComment' => $rawComment]);
});

Route::get('/playlists', [PlaylistController::class,'index'])->name('playlists.index');

Route::get('/playlists/create', [PlaylistController::class,'create'])->name('playlists.create');

Route::post('/playlists', [PlaylistController::class,'store'])->name('playlists.store');

Route::get('/playlists/{id}/edit', [PlaylistController::class,'edit'])->name('playlists.edit');

Route::put('/playlists/{id}', [PlaylistController::class,'update'])->name('playlists.update');

Route::delete('/playlists/{id}', [PlaylistController::class,'destroy'])->name('playlists.destroy')

// Flipkart-style admin-only product add route
Route::middleware(['auth', 'admin'])->get('/products/add', function () {
    return 'Add New Product form goes here (admin only).';
});

// Verified-email-only demo route (ChatGPT-generated middleware, adapted)
Route::middleware(['auth', 'verified.custom'])->get('/verified-only-demo', function () {
    return 'Welcome! Your email is verified, so you can see this page.';
});

// AJAX song search route - returns JSON list of matching songs
Route::get('/search-songs', function (\Illuminate\Http\Request $request) {
    $songs = [
        ['id' => 1, 'title' => 'Kesariya', 'artist' => 'Arijit Singh'],
        ['id' => 2, 'title' => 'Apna Bana Le', 'artist' => 'Arijit Singh'],
        ['id' => 3, 'title' => 'Tum Hi Ho', 'artist' => 'Arijit Singh'],
        ['id' => 4, 'title' => 'Raataan Lambiyan', 'artist' => 'Jubin Nautiyal'],
        ['id' => 5, 'title' => 'Chaiyya Chaiyya', 'artist' => 'Sukhwinder Singh'],
        ['id' => 6, 'title' => 'Naatu Naatu', 'artist' => 'Rahul Sipligunj'],
        ['id' => 7, 'title' => 'Kal Ho Naa Ho', 'artist' => 'Sonu Nigam'],
        ['id' => 8, 'title' => 'Tera Ban Jaunga', 'artist' => 'Akhil Sachdeva'],
    ];

    $query = strtolower($request->query('q', ''));

    if ($query === '') {
        return response()->json($songs);
    }

    $filtered = array_values(array_filter($songs, function ($song) use ($query) {
        return str_contains(strtolower($song['title']), $query) ||
               str_contains(strtolower($song['artist']), $query);
    }));

    return response()->json($filtered);
});

// Live song search page - jQuery AJAX demo
Route::get('/song-search', function () {
    return view('song-search');
});
Route::get('/playlist/top-songs', [PlaylistController::class, 'getTopSongs']);
require __DIR__.'/auth.php';