<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\CommentRequest;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Comment::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return response([
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Validation\CommentRequest  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update(['body' => $request->body]);

        return response([
            'success' => 'The comment has been updated.',
            'comment' => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response([
            'success' => 'The comment has been deleted.'
        ]);
    }

    /**
     * Authorize the controller methods.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
         return [
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
