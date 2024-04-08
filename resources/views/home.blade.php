@extends('layout.nav_bar')

<!-- Dans votre fichier de vue, par exemple home.blade.php -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Le reste de votre contenu de page -->

