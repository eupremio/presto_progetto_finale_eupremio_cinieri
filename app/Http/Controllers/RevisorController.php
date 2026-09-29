<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)
            ->orderBy('created_at', 'asc')
            ->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);

        return redirect()->back()->with('message', 'Articolo accettato');
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);

        return redirect()->back()->with('message', 'Articolo rifiutato');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('homepage')
            ->with('message', 'Richiesta inviata correttamente');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $user->email,
        ]);

        return redirect()->route('homepage')
            ->with('message', 'Utente reso revisore');
    }
}