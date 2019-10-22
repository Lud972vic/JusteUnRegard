{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('lib_cat', 'Lib_cat:') !!}
			{!! Form::text('lib_cat') !!}
		</li>
		<li>
			{!! Form::label('desc_cat', 'Desc_cat:') !!}
			{!! Form::textarea('desc_cat') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}