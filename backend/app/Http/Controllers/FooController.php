<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefooRequest;
use App\Http\Requests\UpdatefooRequest;
use App\Http\Requests\FooRequest;
use App\Models\foo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:checkUser,foo')->only(
            ['update','destory']
        );
    }

    /**
     *FOOを降順で返す
     *
     * @return Foo
     */
    public function index()
    {
        // return [];
        return Foo::where('user_id', Auth::id())->OrderByDesc('id')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefooRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FooRequest $request)
    {
        $request->merge(
            [
            'user_id' => Auth::id()
            ]
        );
        $foo = Foo::create($request->all());
        return $foo
        ? response()->json($foo, 201)
        : response()->json([], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function show(foo $foo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function edit(foo $foo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefooRequest  $request
     * @param  \App\Models\foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function update(FooRequest $request, Foo $foo)
    {
        $foo->title = $request->title;

        // return $foo;

        return $foo->update()
            ? response()->json($foo)
            : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function destroy(foo $foo)
    {
        return $foo->delete()
        ? response()->json($foo)
        : response()->json([], 500);
    }
    /**
     * is_doneの更新
     *
     * @param  Foo      $task
     * @param  \Request $request
     * @return void
     */
    public function updateDone(Foo $foo, Request $request)
    {
        $foo->is_done = $request->is_done;

        return $foo->update()
            ? response()->json($foo)
            : response()->json([], 500);
    }
}
