{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nom_media', 'Nom_media:') !!}
			{!! Form::text('nom_media') !!}
		</li>
		<li>
			{!! Form::label('lib_media', 'Lib_media:') !!}
			{!! Form::text('lib_media') !!}
		</li>
		<li>
			{!! Form::label('taille_media', 'Taille_media:') !!}
			{!! Form::text('taille_media') !!}
		</li>
		<li>
			{!! Form::label('noto_media', 'Noto_media:') !!}
			{!! Form::text('noto_media') !!}
		</li>
		<li>
			{!! Form::label('url_media', 'Url_media:') !!}
			{!! Form::text('url_media') !!}
		</li>
		<li>
			{!! Form::label('desc_media', 'Desc_media:') !!}
			{!! Form::textarea('desc_media') !!}
		</li>
		<li>
			{!! Form::label('type_fichier_media', 'Type_fichier_media:') !!}
			{!! Form::text('type_fichier_media') !!}
		</li>
		<li>
			{!! Form::label('dure_media', 'Dure_media:') !!}
			{!! Form::text('dure_media') !!}
		</li>
		<li>
			{!! Form::label('categorie_id', 'Categorie_id:') !!}
			{!! Form::text('categorie_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}