<TapinRadio>
	@foreach ($cities as $city)
	@if($city->radios->count() > 0)

	<Group title="{{ $city->name }}">		
		@foreach ($city->radios as $radio)
		@if($radio->streaming != '')
		<Station title="{{ $radio->name }} {{ $radio->frequency }} MHz" country="Argentina" countrystate="{{ $radio->state->name }}" url="{{ $radio->website }}">
            <Source>{{ $radio->streaming }}</Source>
        </Station>
        @endif
        @endforeach
	
	</Group>
	@endif
	@endforeach
</TapinRadio>
