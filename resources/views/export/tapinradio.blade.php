<?xml version="1.0" encoding="UTF-8"?>
<TapinRadio>
    <Group title="Root">
    	@foreach ($radios as $radio)
        <Station title="{{ $radio->name }}" country="Argentina" countrystate="{{ $radio->state }}" url="{{ $radio->website }}">
            <Source>{{ $radio->streaming }}</Source>
        </Station>
        @endforeach
    </Group>
</TapinRadio>
