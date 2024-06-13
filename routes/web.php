<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\MasterSpecializationController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetTypeController;
use App\Http\Controllers\PostCategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/faq', function () {
    return Inertia::render('Faq');
});

Route::get('/article', [PostController::class, 'publicArticles']);
Route::get('/article/{id}/{title}', [PostController::class, 'show']);

Route::get('/about', function () {
    return Inertia::render('AboutUs');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.show.login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.show.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Route::get('/article', [PostController::class, 'show']);

Route::prefix('/dashboard')->middleware('auth')->group(function () {

    // Profile
    Route::prefix('/profile')->group(function () {
        Route::get('', [ProfileController::class, 'index'])->name('profile.show');
        Route::post('update/information', [ProfileController::class, 'updateProfileInformation'])->name('profile.update.information');
        Route::post('change/password', [ProfileController::class, 'changePassword'])->name('profile.change.password');
    });

    // Author Role
    Route::middleware('role:author')->group(function () {
        Route::prefix('/author/workspace')->group(function () {
            Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.author');

            // Category
            Route::resource('category', CategoriesController::class);

            // Post
            Route::resource('post', PostController::class);

            // Post and Categories
            Route::prefix('/post_category')->group(function () {
                Route::get('/create_new_post/{post_id}/{category_id}', [PostCategoriesController::class, 'create_new_post'])->name('post.create-new-post');
            });

            // Related View Article Categories
            Route::get('/category/{category_id}/related-posts', [PostCategoriesController::class, 'showRelatedPosts'])->name('category.related-posts');
        });
    });

    // User Role
    Route::middleware('role:user')->group(function () {
        Route::prefix('/user/preview')->group(function () {
            Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.user');
        });
    });

    // Doctor Role
    Route::middleware('role:doctor')->group(function () {
        Route::prefix('/doctor/workspace')->group(function () {
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
    });

    // Admin Role
    Route::middleware('role:admin')->group(function () {

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
});
