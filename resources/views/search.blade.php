@extends('layouts.site')

@section('title')
    Qidiruv natijalari
@endsection

@section('content')

<section class="news">
   <div class="container">
     <div class="news__wrapper basic-flex">
       <div class="column-news">
         <h2 class="news__title">
             @if(count(($posts))>0) {{ $key }}  so'zi bo'yicha qidiruv natijalari : {{count($posts)}}
             @else
                 {{$key}}  kalit so'zi bo'yicha natija topilmadi
             @endif
         </h2>
         <ul class="news__list basic-flex">
          @foreach ($posts as $post)
          <li class="news__item">
            <a href="{{route('postDetail', $post->slug)}}" class="basic-flex news__link">
              <div class="news-image-wrapper"><img src="/img/{{$post->image}}" alt="Bottom Img"></div>
              <div class="news-box basic-flex">
                <h4 class="news__title">{{$post['title_'.\App::getLocale()]}}</h4>
                <p class="news__description">{!!$post['body_'.\App::getLocale()]!!}</p>
                <span class="news__date basic-flex">{{$post->created_at->format('H:i/d.m.Y')}}</span>
              </div>
            </a>
          </li>
          @endforeach
         </ul>

       </div>
      @include('sections.popularPost')
     </div>
   </div>
 </section>

@endsection
