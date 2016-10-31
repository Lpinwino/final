<div style="display:table;height:100%;width:100%;font-size:16px">
	@foreach( $events as $index => $event)
	<div style="display:table-row;background-color: {{ $index % 2 ? '#ECF8E0' :'#FFFFFF'}}">
		<div style="display:table;">
			<div style="display:table-cell;width:50%;">
				<img src="">Imagen del evento</div>
			</div>
			<div style="display:table-cell;width:50%;">
				<h2 style="margin:0px;">{{ $event->title }}</h2><br>
				<b>{{ $event->date_event }} - {{ $event->end_event }}</b>
				<p style="text-transform:italic;padding:5px 0px;">
					{{ $event->concept }}
				</p>
			</div>
		</div>
	</div>
	@endforeach
	<div style="display:table-cell;width:50%;">
	