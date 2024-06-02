<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InertiaAdminController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\MasterSpecializationController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\PostCategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrescriptionItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Inertia\Auth\InertiaAuthController;
use App\Models\PrescriptionItem;

// Route::prefix('/inertia')->group(function () {
//     Route::prefix('/test')->group(function () {

//         //Specialization
//         Route::get('/admin/specialization/create', function () {
//             return Inertia::render('Dashboard/Admin/Specialization/Create', [
//                 'user' => 'rafi'
//             ]);
//         });

//         //User
//         Route::get('/admin/user/create', function () {
//             $user = Auth::user();
//             return Inertia::render('Dashboard/Admin/User/Create', [

//             ]);
//         });
//     });
// });

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/faq', function () {
    return Inertia::render('Faq');
})->name('faq');

Route::get('/article', [PostController::class, 'publicArticles'])->name('article');
Route::get('/article/{id}/{title}', [PostController::class, 'show'])->name('article.show');

Route::get('/about', function () {
    return Inertia::render('AboutUs');
})->name('about');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.show.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Redirect to respective dashboard based on role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role == 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($role == 'author') {
            return redirect()->route('dashboard.author');
        } elseif ($role == 'doctor') {
            return redirect()->route('dashboard.doctor');
        } elseif ($role == 'user') {
            return redirect()->route('dashboard.user');
        }
        return redirect()->route('home');
    })->name('dashboard');

    // Profile Routes
    Route::prefix('/dashboard/profile')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('profile.show');
        Route::post('update/information', [ProfileController::class, 'updateProfileInformation'])->name('profile.update.information');
        Route::post('change/password', [ProfileController::class, 'changePassword'])->name('profile.change.password');
    });
});

// Author Role
Route::middleware(['auth', 'role:author'])->prefix('/dashboard/author/workspace')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.author');

    // Category
    Route::resource('category', CategoriesController::class);

    // Post
    Route::resource('post', PostController::class);

    // Post and Categories
    Route::prefix('/post_category')->group(function () {
        Route::get('/create_new_post/{post_id}/{category_id}', [PostCategoriesController::class, 'create_new_post'])->name('post.create-new-post');
    });
});

// User Role
Route::middleware(['auth', 'role:user'])->prefix('/dashboard/user/preview')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.user');
            // Route::get('', function () {
            //     return Inertia::render('Admin/Test');
            // })->name('dashboard.show.user');
});

// Doctor Role
Route::middleware(['auth', 'role:doctor'])->prefix('/dashboard/doctor/workspace')->group(function () {
    // Dashboard
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.doctor');

    // Medical Record
    Route::prefix('/medical_record')->group(function () {
        Route::get('/list', [MedicalRecordController::class, 'list'])->name('medical_record.list');
        Route::post('/diagnosis', [MedicalRecordController::class, 'diagnosis'])->name('medical_record.diagnosis');
        Route::get('/check/{id}', [MedicalRecordController::class, 'check'])->name('medical_record.check');
        Route::get('/action/{id}', [MedicalRecordController::class, 'action'])->name('medical_record.action');
    });

    // Pet
    Route::prefix('/pet')->group(function () {
        Route::get('/check/{id}', [PetController::class, 'check'])->name('pet.check');
        Route::put('/update_pet', [PetController::class, 'updateByDoctor'])->name('pet.update.by.doctor');
    });
});

    // Admin Role
    Route::middleware('role:admin')->group(function () {

        Route::get('', [DashboardController::class, 'index'])->name('dashboard.show');
// Admin Role
Route::middleware(['auth', 'role:admin'])->prefix('/dashboard')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.show');

    Route::get('/quick_start/{page}', [DashboardController::class, 'quick_start'])->name('dashboard.quick_start');

    // User
    Route::prefix('/user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
    });

    // Admin
    Route::resource('admin', AdminController::class);

    // Author
    Route::resource('author', AuthorController::class);

    // Doctor
    Route::resource('doctor', DoctorController::class);

    // Pet
    Route::resource('pet', PetController::class);

    // Medical Record
    Route::prefix('/medical_record')->group(function () {
        Route::get('', [MedicalRecordController::class, 'index'])->name('medical_record.index');
        Route::get('/create', [MedicalRecordController::class, 'create'])->name('medical_record.create');
        Route::post('/store', [MedicalRecordController::class, 'store'])->name('medical_record.store');
    });

    // Master
    Route::prefix('/master')->group(function () {
        Route::resource('pet_type', PetTypeController::class);
        Route::resource('inventory_category', InventoryCategoryController::class);
        Route::resource('inventory_item', InventoryItemController::class);
        Route::resource('specialization', MasterSpecializationController::class);
    });
});


// Get user details
Route::middleware(['auth'])->get('/user', [UserController::class, 'getUser'])->name('user.get');

