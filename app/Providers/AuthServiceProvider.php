<?php

// use App\Providers\AppServiceProvider;
// use Illuminate\Support\Facades\Gate;


// class AuthServiceProvider extends AppServiceProvider
// {
//     public function boot(): void
//     {
//         // Implicitly grant "Super Admin" role all permissions
//         // This works in the app by using gate-related functions like auth()->user->can() and @can()
//         Gate::before(function ($user, $ability) {
//             return $user->hasRole('Super Admin') ? true : null;
//         });
//     }
// }
