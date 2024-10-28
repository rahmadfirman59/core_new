<?php

namespace App\Services;

class MenuService
{
    protected static array $admin = [
        ['route' => 'admin', 'caption' => 'Dashboard'],
        ['route' => 'admin.user.index', 'caption' => 'Data Master', 'side_menus' => [
            ['route' => 'admin.user.index', 'caption' => 'User'],
            ['route' => 'admin.slider.index', 'caption' => 'Slider'],
            ['route' => 'admin.kategori.index', 'caption' => 'Kategori'],
        ]],
        ['route' => 'admin.sambutan.index', 'caption' => 'Profil', 'side_menus' => [
            ['route' => 'admin.sambutan.index', 'caption' => 'Sambutan'],
            ['route' => 'admin.visimisi.index', 'caption' => 'Visi Misi'],
            ['route' => 'admin.profil.sejarah', 'caption' => 'Sejarah'],
            ['route' => 'admin.profil.pengurus', 'caption' => 'Pengurus'],
            ['route' => 'admin.profil.program.kerja', 'caption' => 'Program Kerja'],
        ]],
        ['route' => 'admin.produk.index', 'caption' => 'Produk', 'side_menus' => [
            ['route' => 'admin.produk.index', 'caption' => 'Produk'],
        ]],
        ['route' => 'admin.kegiatan.index', 'caption' => 'Kegiatan', 'side_menus' => [
            ['route' => 'admin.kegiatan.index', 'caption' => 'Kegiatan'],
        ]],
    ];
    protected static array $umkm = [
        ['route' => 'admin', 'caption' => 'Dashboard'],
        ['route' => 'admin.user.index', 'caption' => 'Data Master', 'side_menus' => [
            ['route' => 'admin.user.index', 'caption' => 'User'],
            ['route' => 'admin.slider.index', 'caption' => 'Slider'],
            ['route' => 'admin.kategori.index', 'caption' => 'Kategori'],
        ]],
        ['route' => 'admin.profil.sambutan', 'caption' => 'Profil', 'side_menus' => [
            ['route' => 'admin.profil.sambutan', 'caption' => 'Sambutan'],
            ['route' => 'admin.profil.visi.misi', 'caption' => 'Visi Misi'],
            ['route' => 'admin.profil.sejarah', 'caption' => 'Sejarah'],
            ['route' => 'admin.profil.pengurus', 'caption' => 'Pengurus'],
            ['route' => 'admin.profil.program.kerja', 'caption' => 'Program Kerja'],
        ]],
        ['route' => 'admin.produk.index', 'caption' => 'Produk', 'side_menus' => [
            ['route' => 'admin.produk.index', 'caption' => 'Produk'],
        ]],
        ['route' => 'admin.kegiatan.index', 'caption' => 'Kegiatan', 'side_menus' => [
            ['route' => 'admin.kegiatan.index', 'caption' => 'Kegiatan'],
        ]],
    ];

    public function list_menu($role): array
    {
        $menus = match ($role) {
            "Super Admin" => self::$admin,
            default => [],
        };
        return $menus;
    }

    public static function current_menu($menus, $current_route, $role_active, $current_route_params = []) {
        unset($current_route_params['warehouse_selected']);
        unset($current_route_params['date']);

        $breadcrumbs = [['route' => head(explode('.', $current_route)), 'caption' => $role_active]];
        $current_menu = [];
        $current_sub_menu = [];
        $current_side_menu = [];
        foreach ($menus as $menu) {
            if ($menu['route'] === $current_route && ($menu['params'] ?? []) === $current_route_params) {
                $current_menu = $menu;
                $breadcrumbs[] = $menu;
            }
            foreach ($menu['sub_menus'] ?? [] as $sub_menu) {
                if ($sub_menu['route'] === $current_route && ($sub_menu['params'] ?? []) === $current_route_params) {
                    $current_menu = $menu;
                    $current_sub_menu = $sub_menu;
                    if ($sub_menu['route'] !== $menu['route']) $breadcrumbs[] = $sub_menu;
                }
                foreach ($sub_menu['side_menus'] ?? [] as $side_menu) {
                    if ($side_menu['route'] === $current_route && ($side_menu['params'] ?? []) === $current_route_params) {
                        $current_menu = $menu;
                        $current_sub_menu = $sub_menu;
                        $current_side_menu = $side_menu;
                        $breadcrumbs[] = $sub_menu;
                        $breadcrumbs[] = $side_menu;
                    }
                }
            }
            foreach ($menu['side_menus'] ?? [] as $side_menu) {
                if ($side_menu['route'] === $current_route && ($side_menu['params'] ?? []) === $current_route_params) {
                    $current_menu = $menu;
                    $current_side_menu = $side_menu;
                    if (last($breadcrumbs)['route'] !== $menu['route']) $breadcrumbs[] = $menu;
                    if ($side_menu['route'] !== $menu['route'] || ($side_menu['params'] ?? []) !== ($menu['params'] ?? [])) $breadcrumbs[] = $side_menu;
                }
            }
        }

        if (empty($current_menu)) {
            $temp = explode('.', $current_route);
            if (last($temp) === 'show' || last($temp) === 'create') {
                $temp[count($temp) - 1] = 'index';
                $current_route = join('.', $temp);
                return self::current_menu($menus, $current_route, $role_active, $current_route_params);
            } else {
                if (count($temp) > 2) {
                    array_splice($temp, count($temp) - 2, 1);
                    $current_route = join('.', $temp);
                    return self::current_menu($menus, $current_route, $role_active, $current_route_params);
                }
            }
        }

        $current = $current_side_menu ?? [];
        if (empty($current)) $current = $current_sub_menu ?? [];
        if (empty($current)) $current = $current_menu;
        $actions = $current['actions'] ?? [];

        return [
            'current_menu' => $current_menu,
            'current_sub_menu' => $current_sub_menu,
            'current_side_menu' => $current_side_menu,
            'breadcrumbs' => $breadcrumbs,
            'actions' => $actions,
        ];
    }

    public static function side_menu_warehouse($menus) {
        foreach ($menus as $key => $menu) {
            if ($menu['route'] === 'warehouse.index') {
                $side_menus = $menu['side_menus'] ?? [];
                $warehouseService = new WarehouseService();
                foreach ($warehouseService->search() as $warehouse) $side_menus[] = ['route' => 'product_stock.index', 'params' => ['warehouse_uuid' => $warehouse->uuid], 'caption' => $warehouse->name];
                $menus[$key]['side_menus'] = $side_menus;
            }
        }
        return $menus;
    }
}
