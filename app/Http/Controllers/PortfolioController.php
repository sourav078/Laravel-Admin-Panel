<?php

namespace App\Http\Controllers;

use App\Models\Backend\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
      return view('backend.pages.portfolio.index', compact('portfolios'));
//        return response()->json($portfolios);
    }

    public function create()
    {
        return view('backend.pages.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|url',
        ]);

        $imagePath = $request->file('image')->store('portfolio', 'public');

        // Read image from file system
        $image = Image::make(public_path("storage/{$imagePath}"));

        // Resize image proportionally to fit within 200x200 pixels
        $image->fit(300, 300);

        // Save modified image
        $image->save();

        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item added successfully.');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.pages.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' =>'required',
            'link' => 'required|url',
        ]);

        $portfolio = Portfolio::findOrFail($id);
//        dd($request->hasFile('image'));
        if ($request->hasFile('image')) {

            if (file_exists(public_path("storage/{$portfolio->image}"))) {

                unlink(public_path("storage/{$portfolio->image}"));
            }
            $imagePath = $request->file('image')->store('images', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->resize(200, 200)->save();


            $portfolio->image = $imagePath;
        }
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete the image file
        if (file_exists(public_path("storage/{$portfolio->image}"))) {
            unlink(public_path("storage/{$portfolio->image}"));
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item deleted successfully.');
    }



            //api functions

    public function apiindex()
    {
        $portfolios = Portfolio::all();
//        return response()->json($portfolios);
        $portfolios->transform(function ($portfolio) {
            $portfolio->image = asset('storage/' . $portfolio->image);
            return $portfolio;
        });
        return response()->json($portfolios);
    }


}
