<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefooRequest;
use App\Http\Requests\UpdatefooRequest;
use App\Models\foo;

class FooController extends Controller
{
    /**
     *FOOを降順で返す
     *
     * @return Foo
     */
    public function index()
    {
        return Foo::OrderByDesc('id')->get();
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
     * @return \Illuminate\Http\Response
     */
    public function store(StorefooRequest $request)
    {
        //
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
    public function update(UpdatefooRequest $request, foo $foo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\foo  $foo
     * @return \Illuminate\Http\Response
     */
    public function destroy(foo $foo)
    {
        //
    }
}
