<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App;
use App\Models\Modification;
use App\Models\Product;
use DB;

class ModificationController extends AppBaseController
{
    public function index($id)
    {
        $modifications = DB::table('modifications')
            ->where('category', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.modification.all', compact('modifications', 'id'));
    }

    public function create($category)
    {
        return view('admin.modification.add', compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $modification = Modification::find($id);

        return view('admin.modification.edit', compact('modification'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $objModification = new Modification();

        $objModification->create([
            'title' => $input['title'],
            'category' => $input['cat']
        ]);

        return back();
    }

    public function update(Request $request)
    {

        $input = $request->all();

        $objModification = new Modification();

        $objModification->where('id', '=', $input['id'])->update([
            'title' => $input['title'],
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $modification = Modification::find($input['id']);

        $products = Product::where('modification', $modification->id)
            ->get();

        foreach ($products as $product) {
            $product->delete($product->id);
        }

        $modification->delete($input['id']);

        return back();
    }

}
