# AUTH Framework - Lessons Learned

## 2026-07-17

### Route Discovery

- Jangan mengasumsikan representasi Route::livewire().
- Selalu lakukan debug RouteCollection terlebih dahulu.
- Laravel 12 berbeda dengan Laravel 10/11.
- Jangan menggunakan Route::getMiddleware().

### Permission vs Menu

- Permission bukan Menu.
- Permission dibuat untuk semua Route.
- Menu hanya dibuat untuk Route tanpa required parameter.
- Route edit/show tidak boleh menjadi menu karena membutuhkan parameter.
- Gunakan $route->parameterNames() untuk mengecek parameter.