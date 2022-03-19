@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    <div class="home-background d-flex align-items-center justify-content-center flex-column text-white mb-4"
         style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') center / cover no-repeat">
        @if(theme_config('show_welcome_message') === 'on')
            <div class="col-md-4 text-center" style="background-color: rgba(0, 0, 0, 0.6); border: 8px solid black; border-radius: 15px">
                <h1 class="mb-4 text-light">{{ $message }}</h1>

                <div>
                    @foreach($servers as $server)
                        <div>
                            {{ $server->name }}

                            @if ($server->isOnline())
                                <h2 class="mb-4 text-light">
                                    {{ trans_choice('messages.server.total', $server->getOnlinePlayers(), [
                                            'max' => $server->getMaxPlayers(),
                                    ]) }}
                                </h2>
                            @else
                                <h2 class="text-light">{{ trans('messages.server.offline') }}</h2>
                            @endif

                            @if($server->joinUrl())
                                <a href="{{ $server->joinUrl() }}" class="btn btn-primary">
                                    {{ trans('messages.server.join') }}
                                </a>
                            @else
                                <p class="card-text">{{ $server->fullAddress() }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="post-preview card mb-3 shadow-sm">
                        @if($post->hasImage())
                            <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                            <p class="card-text">{{ Str::limit(strip_tags($post->content), 250) }}</p>
                            <a class="btn btn-primary"
                               href="{{ route('posts.show', $post) }}">{{ trans('messages.posts.read') }}</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
