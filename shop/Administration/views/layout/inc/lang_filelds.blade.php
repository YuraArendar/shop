@if(isset($locales) && count($locales)>1)
    <div class="btn-group pull-right">
        <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Language {{ LaravelLocalization::getCurrentLocaleName() }}<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            @foreach($locales as $key=>$val)
                @if(LaravelLocalization::getCurrentLocale() != $key)
                    <li>
                        <a class="select-language" rel="alternate" hreflang="{{ $key }}"  href="{{LaravelLocalization::getLocalizedURL($key) }}">
                            {{ $val['native'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif