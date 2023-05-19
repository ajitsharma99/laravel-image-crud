<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use Illuminate\Http\Request;
use Session;
use File;

class ImageCrudController extends Controller
{
    public function all_products()
    {
        $products = ImageCrud::all();
        // return $products;
        return  view('products', compact('products'));
    }

    public function add_new_product()
    {
        return view('add_new_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required | mimes:jpeg,png,jpg'
        ]);

        // return $request;

        $imageName = ' ';

        if ($image = $request->file('image')) {
            $imageName = time() . '.' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/products', $imageName);
        }
        //    return $request;
        ImageCrud::create([
            'name' => $request->name,
            'image' => $imageName
        ]);

        Session()->flash('successMsg', 'successfully added');

        return redirect()->route('all.products');
    }

    public function edit_product($id)
    {

        $product = ImageCrud::findorFail($id);

        return view('edit_product', compact('product'));
    }



    public function update_product(Request $request, $id)
    {
        $product = ImageCrud::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg'
        ]);

        // return $request;

        $imageName = ' ';
        $oldImage = 'images/products' . $product->image;

        if ($image = $request->file('image')) {

            if (file_exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageName = time() . '.' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/products', $imageName);
        } else {
            $imageName =  $product->image;
        }

        //return $request;
        ImageCrud::where('id', $id)->update([
            'name' => $request->name,
            'image' => $imageName
        ]);

        Session()->flash('successMsg', 'Updated successfully ');

        return redirect()->route('all.products');
    }


    public function delete_product($id)
    {
        $product = ImageCrud::findorfail($id);
        /*firstly public folder theke delete korlam */
        $oldImage = 'images/products/' . $product->image;
        if (file_exists($oldImage)) {
            File::delete($oldImage);
        }

        /* Database theke delete */
        $product->delete();

        Session()->flash('successMsg', 'Delete Item successfully ');

          return redirect()->route('all.products');
    }
}
