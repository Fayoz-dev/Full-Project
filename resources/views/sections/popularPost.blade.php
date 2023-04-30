<div class="popular-news">
   <div class="popular-news-wrapper">
     <h4 class="popular-news__title">Cамые популярные новости</h4>
     <ul class="popular-news__list">
      @foreach ($popularPosts as $popularPost)
      <li class="popular-news__item">
        <a href="#">
          <p class="popular-news__description">{{$popularPost['title_'.\App::getLocale()]}}</p>
          <span class="popular-news__date">{{$popularPost->created_at->format('H:i/d.m.Y')}}</span>
        </a>
      </li>
      @endforeach

     </ul>
   </div>
  <a href="{{$ad -> url2}}" class="ads-placeholder" style="background-image: url(/site/images/ads/{{$ad->image2}})">
  <h1>{{$ad->title2}}</h1>
</a>

 </div>
