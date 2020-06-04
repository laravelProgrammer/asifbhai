<ul class="nav navbar-nav">

    @php

        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }
        // echo json_encode($items);
    @endphp

    @foreach ($items as $item)

        @php

            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $isActive = null;
            $styles = null;
            $icon = null;

            // Background Color or Color
            if (isset($item->color) && $item->color == true) {
                // $styles = 'color:'.$item->color;
            }
            if (isset($item->background) && $item->background == true) {
                $styles = 'background-color:'.$item->color;
            }

            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }

            // Set Icon
            if(isset($item->icon_class) && $item->icon_class == true){
                $icon = '<i class="icon ' . $item->icon_class . '"></i>';
            }

        @endphp

        <li class="{{ $isActive }}">
            <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}">
                {!! $icon !!}
                <span class="title">{{ $item->title }}</span>
            </a>
            @if(!$originalItem->children->isEmpty())
                @include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
            @endif
        </li>
    @endforeach

    </ul>
