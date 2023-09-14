@if ($paginator->hasPages())

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,
button,
li {
  font-family: "Arial", sans-serif;
  color: #343a40;
  line-height: 1;
}

.pagination,
.page-numbers {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}

.pagination {
  margin-top: 128px;
}

.btn-nav,
.btn-page {
  border-radius: 50%;
  background-color: #fff;
  cursor: pointer;
}

.btn-nav {
  padding: 8px;
}

.btn-nav {
  width: 42px;
  height: 42px;
  border: 1.5px solid #B2B2B2;
  color: #B2B2B2;
}

.btn-nav:hover,
.btn-page:hover {
  background-color: #B2B2B2;
  color: black;
}

.btn-page {
  border: none;
  width: 36px;
  height: 36px;
  font-size: 16px;
}

.btn-page a:hover {
  color: black;
}

.btn-nav a:hover {
    color: black;
}

.btn-selected {
  background-color: #B2B2B2;
  color: black;
}
</style>
    
<div class="pagination">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="btn-nav left-btn disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="left-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </li>
    @else
        <li class="btn-nav left-btn">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="left-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        </li>
    @endif


    {{-- <li class="btn-nav left-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="left-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
    </li> --}}


    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <div class="page-numbers">
            <li class="dots disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        </div>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        <div class="page-numbers">
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="btn-page btn-selected" aria-current="page" style="padding: 10px;"><span>{{ $page }}</span></li>
                @else
                    <li class="btn-page" style="padding: 10px;"><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        </div>
        @endif
    @endforeach

    
    {{-- <div class="page-numbers">
        <button class="btn-page">1</button>
        <button class="btn-page">2</button>
        <button class="btn-page btn-selected">3</button>
        <button class="btn-page">4</button>
        <button class="btn-page">5</button>
        <button class="btn-page">6</button>
        <span class="dots">...</span>
        <button class="btn-page">23</button>
    </div> --}}




    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="btn-nav right-btn">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="right-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </li>
    @else
        <li class="btn-nav right-btn disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="right-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </li>
    @endif


    {{-- <button class="btn-nav right-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="right-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button> --}}
</div>


@endif














































