{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('code_postal_ville_geo', 'Code_postal_ville_geo:') !!}
			{!! Form::text('code_postal_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('nom_ville_geo', 'Nom_ville_geo:') !!}
			{!! Form::text('nom_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('region_ville_geo', 'Region_ville_geo:') !!}
			{!! Form::text('region_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('latitude_ville_geo', 'Latitude_ville_geo:') !!}
			{!! Form::text('latitude_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('longitude_ville_geo', 'Longitude_ville_geo:') !!}
			{!! Form::text('longitude_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('eloignement_ville_geo', 'Eloignement_ville_geo:') !!}
			{!! Form::text('eloignement_ville_geo') !!}
		</li>
		<li>
			{!! Form::label('countrie_id', 'Countrie_id:') !!}
			{!! Form::text('countrie_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}