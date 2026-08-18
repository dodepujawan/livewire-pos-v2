## AUTH v1

### Resolved

#### Missing required parameter for route

Penyebab:
- SyncAuthCommand membuat Menu untuk semua Livewire Route, termasuk route dengan parameter.
- Route seperti barang-edit, transaksi-show, transaksi-edit membutuhkan parameter ({id}).
- Sidebar mencoba memanggil route($menu->route_name) tanpa parameter.

Solusi:
- Pisahkan konsep Permission dan Menu.
- Permission dibuat untuk semua Route.
- Menu hanya dibuat untuk Route tanpa required parameter.
- Gunakan $route->parameterNames() untuk mengecek parameter.

Status:
✅ Resolved (2026-07-17)

---

### Open Issues

#### app:sync-auth menemukan 0 route

Penyebab:
- Route discovery belum sesuai implementasi Livewire 4.

Status:
Investigasi.

---

### Sidebar kosong

Penyebab:
- menus kosong.

Checklist:
- migrate
- app:sync-auth
- permission cache reset