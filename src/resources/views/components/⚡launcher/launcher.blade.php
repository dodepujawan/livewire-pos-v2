<div class="space-y-6">
    @foreach($groupedMenus as $group => $menus)
        @php
            $groupModel = \App\Models\LauncherGroup::where('key', $group)->first();
        @endphp
        <div>
            <div class="flex items-center gap-2 mb-3">
                @if($groupModel && $groupModel->icon)
                    <span class="inline-flex h-5 w-5 items-center justify-center rounded-md bg-gray-100 text-gray-600">
                        <i class="{{ $groupModel->icon }} text-sm"></i>
                    </span>
                @endif
                <h2 class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                    {{ $groupModel?->label ?? ucfirst(str_replace('_', ' ', $group)) }}
                </h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @foreach($menus as $menu)
                    <a
                        href="{{ $menu->systemRoute?->route_name ? route($menu->systemRoute->route_name) : '#' }}"
                        wire:navigate
                        class="group flex flex-col items-center justify-center gap-2 p-4 rounded-xl border border-gray-200 bg-white hover:border-blue-400 hover:shadow-md hover:-translate-y-0.5 transition"
                    >
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 group-hover:bg-blue-100 transition">
                            @if($menu->icon)
                                <i class="{{ $menu->icon }} text-lg"></i>
                            @else
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            @endif
                        </div>
                        <span class="text-xs font-medium text-center leading-tight text-gray-700 line-clamp-2">
                            {{ $menu->title }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach

    @if($groupedMenus->isEmpty())
        <div class="text-center text-gray-400 py-10 text-sm">
            Tidak ada menu untuk Launcher.
        </div>
    @endif
</div>
