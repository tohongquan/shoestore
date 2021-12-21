<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /*
     * Hiển thị danh mục
     */

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    /*
     * Hiển thị chi tiết danh mục
     */

    public  function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    /*
     * Chỉnh sửa danh mục
     */

    public function update(Menu $menu, MenuFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }


    /*
     * Xoá danh mục
     */
    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.menu.add',
            [
                'title' => 'Thêm Danh Mục',
                'menus' => $this->menuService->getParent()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(MenuFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }
}
