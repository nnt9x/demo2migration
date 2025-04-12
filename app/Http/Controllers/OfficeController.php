<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ DB -> trả về view
        $offices = Office::query()->get();
        return view('office.index', ['offices' => $offices]);
    }

    public function show($id)
    {
        # B1: Tim office theo id
        $office = Office::query()->findOrFail($id);
        # B2: tra du lieu ve view
        return view('office.show', ['office' => $office]);
    }

    // GET: office/create
    public function create()
    {
        return view('office.create');
    }

    // POST: office/create
    public function save(Request $request)
    {
        # B1: Lấy dữ liệu
        $officeName = $request->get('officeName');
        $officeAddress = $request->get('officeAddress');
        $officeDescription = $request->get('officeDescription');
        # B2: Lưu vào DB
        DB::table('offices')->insert([
            'name' => $officeName,
            'address' => $officeAddress,
            'description' => $officeDescription
        ]);
        // Lua chon khac Office::query()->create...
        # B3: chuyển hướng về index: danh sách office
        return redirect('/offices');
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        // Thuc hien xoa
        $office = Office::query()->findOrFail($id);
        $office->delete();
        # Chuyen huong ve index
        return redirect('/offices');
    }
}
