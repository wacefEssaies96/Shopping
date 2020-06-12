<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $date = new \DateTime();
        $comment = new Comment();
        $comment->prod_id =  $request->input('prod_id');
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;
        $comment->created_at = $date;
        $comment->updated_at = $date;
        $comment->save();
        return new JsonResponse([   'message' => 'Comment registred with success !',
                                    'image' => Auth::user()->image,
                                    'name' => Auth::user()->name,
                                    'created_at' => date_format( $date, 'Y-m-d H:i:s'),
                                    'id' => $comment->id]
                                , 200); 
    }

    /**
     * Remove comment from database.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $comment = Comment::find($id);
        $prodId = $comment->prod_id;
        $comment->delete();

        return redirect('/Produit/' . $prodId)->with('message','Comment deleted with success')
        ->with('alertType', 'success');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->input('comment');
        $comment->updated_at = new \DateTime();
        $comment->update();
        return new JsonResponse(['message' => 'Comment updated with success !'], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
