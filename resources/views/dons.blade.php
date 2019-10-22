{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('lib_don', 'Lib_don:') !!}
			{!! Form::text('lib_don') !!}
		</li>
		<li>
			{!! Form::label('montant_don', 'Montant_don:') !!}
			{!! Form::text('montant_don') !!}
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