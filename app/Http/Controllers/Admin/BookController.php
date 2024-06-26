<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class BookController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Books/Index', [
			'books' => fn () => Book::with('file')
				->paginate(6)
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		Book::create([
			'title' => $request->title,
			'authors' => $request->authors,
			'isbn' => $request->isbn ?? '',
			'publicated_at' => $request->publicated_at,
			'slug' => Str::slug($request->title),
		]);

		return back();
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Books/Edit', [
			'book' => fn () => Book::where('id', $request->id)
				->select(
					'id',
					'title',
					'authors',
					'isbn',
					'publicated_at',
				)
				->with('file')
				->first()
		]);
	}

	public function update(BookUpdateRequest $request): RedirectResponse
	{
		Book::findOrFail($request->id)
			->update($request->validated());

		return back();
	}

	public function destroy(Request $request): RedirectResponse
	{
		//Hace falta manejar la autorización para eliminar registros

		$book = Book::findOrFail($request->input('id'));

		$book->detachFile();

		$book->delete();

		return Redirect::route('admin.books.index');
	}

	public function uploadFile(UpdateFileRequest $request): RedirectResponse
	{
		$book = Book::findOrFail($request->input('id'));

		$book->attachFile($request);

		return Redirect::route('admin.books.edit', $request->input('id'));
	}

	public function deleteFile(Request $request): RedirectResponse
	{
		$book = Book::findOrFail($request->input('id'));

		$book->detachFile();

		return Redirect::back();
	}
}
