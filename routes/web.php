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
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Inertia\Auth\InertiaAuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
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
    $role = '';
    if (Auth::check()) {
        $role = Auth::user()->role;
        return Inertia::render('Home', [
            'role' => $role
        ]);
    } else {
        return Inertia::render('Home');
    }
});

Route::get('/faq', function () {
    return Inertia::render('Faq');
})->name('faq');

// Article Routes
Route::get('/article', [PostController::class, 'publicArticles'])->name('article');
Route::get('/article/{id}/{title}', [PostController::class, 'show'])->name('article.show');
Route::get('/search', [PostController::class, 'search'])->name('search');


Route::get('/about', function () {
    return Inertia::render('AboutUs');
})->name('about');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.show.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.show.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Route Login With Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/guest/dashboard', function () {
        return view('guest.index');
    })->name('guest.dashboard');
});

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

    // Dashboard
    Route::get('/categories/data', [CategoriesController::class, 'getCategoryData'])->name('categories.data');
    Route::get('/dashboard', [CategoriesController::class, 'dashboard'])->name('dashboard');

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


// User Role
Route::middleware(['auth', 'role:user'])->prefix('/dashboard/user/preview')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.show.user');
    // Route::get('', function () {
    //     return Inertia::render('Admin/Test');
    // })->name('dashboard.show.user');
    Route::prefix('/invoice')->group(function () {
        Route::get('/{invoiceNumber}', [InvoiceController::class, 'pay'])->name('invoice.pay');
        Route::post('/payment', [InvoiceController::class, 'payment'])->name('invoice.payment');
    });
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

    // Prescription
    Route::prefix('/prescription')->group(function () {
        Route::get('', [PrescriptionItemController::class, 'index'])->name('prescription.index');
        Route::get('/create/{id}', [PrescriptionItemController::class, 'create'])->name('prescription.create');
        Route::post('/store', [PrescriptionItemController::class, 'store'])->name('prescription.store');
        Route::get('/destroy/{id}/{med_id}', [PrescriptionItemController::class, 'destroy'])->name('prescription.destroy');
    });

    // Pet
    Route::prefix('/pet')->group(function () {
        Route::get('/check/{id}', [PetController::class, 'check'])->name('pet.check');
        Route::put('/update_pet', [PetController::class, 'updateByDoctor'])->name('pet.update.by.doctor');
    });
});

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

    // Transaction

    Route::prefix('/transaction')->group(function () {
        Route::get('', [PaymentController::class, 'index'])->name('payment.index');
        Route::get('/create', [PaymentController::class, 'create'])->name('payment.create');
        Route::post('/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');
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
        Route::get('/view/{id}', [MedicalRecordController::class, 'show'])->name('medical_record.show');
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

    // Invoice 
    Route::prefix('/invoice')->group(function () {
        Route::get('', [InvoiceController::class, 'index'])->name('invoice.index');
        Route::get('/create/{id}', [InvoiceController::class, 'create'])->name('invoice.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('invoice.store');
    });
});


// Get user details
Route::middleware(['auth'])->get('/user', [UserController::class, 'getUser'])->name('user.get');
