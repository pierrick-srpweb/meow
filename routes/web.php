<?php

use App\Livewire\AdopterPage;
use App\Livewire\ContactPage;
use App\Livewire\FAPage;
use App\Livewire\HomePage;
use App\Livewire\ListeChats;
use App\Livewire\TemoignagesPage;
use App\Livewire\VoirChat;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::get('chats-et-chatons', ListeChats::class)->name('liste-chats');

Route::get('temoignages', TemoignagesPage::class)->name('temoignages');

Route::get('/chats-et-chatons/{chat:slug}', VoirChat::class)->name('voir-chat');

Route::get('adopter', AdopterPage::class)->name('adopter');

Route::get('famille-accueil', FAPage::class)->name('famille-accueil');

Route::get('contact', ContactPage::class)->name('contact');
