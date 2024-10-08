<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    private function store(StoreRequest $request)
    {
        $comment = Comment::create($request->validated());
    }

    public function storeForCar(StoreRequest  $request, Car $car)
    {
        $request->replace(array_merge(
            $request->all(), [
                'commentable_type' => Car::class,
                'commentable_id' => $car->id,
            ]
        ));
        $this->store($request);
        return redirect()->back();
    }


    public function storeForBrand(StoreRequest $request, Brand $brand)
    {
        $request->merge([
            'commentable_type' => Brand::class,
            'commentable_id' => $brand->id
        ]);
        $this->store($request);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
