<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookResources;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        try {
            $model = Book::get();
            return response()->json(
                new BookResources($model->paginate(1)));
        } catch (\Exception $exception) {
            return response()->json([
                "massage" => $exception->getMessage()
            ]);
        }
    }

    public function store(StoreBookRequest $request)
    {
        try {
            Book::create($request->only([
                'name', 'company_name', 'phone',
                'email', 'birth'
            ]));
            yield redirect()->route('Save_image/');
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ] ,500 );
        };


    }

    public function show(int $id)
    {
        try {
            $model = Book::find($id);
            return response()->json([
                new BookResource($model)
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'massage' => $exception->getMessage()
            ]);
        }
    }

    public function update(StoreBookRequest $request, int $id)
    {
        try {
            Book::find($id)
                ->update($request->only([
                    'name', 'company_name', 'phone',
                    'email', 'birth'
                ]));
            return response()->json([
                'message' => "Запись $id обновлена"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ] ,500 );
        }
    }

    public function destroy(int $id)
    {
        Book::destroy($id);
        return response()->json();
    }
}
