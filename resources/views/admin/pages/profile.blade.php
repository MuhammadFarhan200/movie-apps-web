@extends('admin.layouts.main')
@section('title-page', 'Profile')

@section('page-heading')
    <h2>Profile</h2>
    <p>Halaman Profile Admin</p>
@endsection

@section('page-content')
    <h3 class="text-center">Selamat Datang Di Halaman Profile!</h3>
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card shadow mt-4">
                <div class="card-body">
                    <h4 class="mt-3">Tentang Anda:</h4>
                    <p class="fs-5 mt-4">Username: {{ Auth::user()->name }}</p>
                    <p class="fs-5 ">Email: {{ Auth::user()->email }}</p>
                    <p>Bergabung Pada {{ Auth::user()->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
