@section('title', '文章列表')

@forelse ($articles as $article)
    <div class="row article">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-info card">
                <div class="panel-body">
                    <h3>
                        <a href="{{ route('article.show_detail', [$article->id, $article->slug]) }}" class="article-title article-link">
                            {{ $article->title }}
                            @if ($article->is_top)
                            <span class="glyphicon glyphicon-arrow-up"></span>
                            @endif
                        </a>
                    </h3>
                    <div class="row">
                        <div class="col-md-8 tags">
                            @foreach ($article->tags as $tag)
                            <a type="button" href="{{ route('tag.articles', [$tag]) }}" name="button" class="btn btn-default btn-xs btn-no-border" aria-label="{{ $tag }}">
                                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> {{ $tag }}
                            </a>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <span class="pull-right">
                                <button type="button" name="button" class="btn btn-default btn-xs btn-no-border">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $article->created_at->diffForHumans() }}
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 hidden-xs hidden-sm img-responsive img-rounded">
                            <div class="first-img">
                                <img src="{{ $article->first_img }}" alt="图片">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 article-body">
                            {!! $article->abstract !!}...
                            <a href="{{ route('article.show_detail', [$article->id, $article->slug]) }}">
                                阅读全文
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="article-nums">
                                <button type="button" name="button" class="btn btn-default btn-xs btn-no-border">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{ $article->view_times }}
                                </button>
                                <button type="button" name="button" class="btn btn-default btn-xs btn-no-border">
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{ $article->praise_times }}
                                </button>
                                <button type="button" name="button" class="btn btn-default btn-xs btn-no-border">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $article->comment_times }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <p class="bg-warning">此栏目下暂时还没有文章哟...</p>
@endforelse
<div class="row" style="text-align:center">
    {!! $page->links() !!}
</div>
