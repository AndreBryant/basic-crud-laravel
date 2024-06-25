@php
    $spacing = "px-4 py-1";
    $border = "border rounded-md";

    switch ($variant) {
        case 'primary':
            $bgColor = "bg-slate-900 hover:bg-slate-800";
            $textColor = "text-slate-50";
            break;
        case 'outline': 
            $bgColor = "bg-white hover:bg-gray-100";
            $textColor = "text-black";
            break;
        case 'destructive':
            $bgColor = "bg-red-600 hover:bg-red-800";
            $textColor = "text-gray-100";
            break;
        default:
            break;
    }
@endphp

<div>
    <a href="{{$to}}">
        <button 
            class="{{$spacing}} {{$border}} {{$bgColor ?? ''}} {{$textColor ?? '' }}"
            {{ $attributes }}    
        >
            {{$text}}
        </button>
    </a>
</div>