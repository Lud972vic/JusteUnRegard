{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('email_verified_at', 'Email_verified_at:') !!}
			{!! Form::text('email_verified_at') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('remember_token', 'Remember_token:') !!}
			{!! Form::text('remember_token') !!}
		</li>
		<li>
			{!! Form::label('pseudo_adh', 'Pseudo_adh:') !!}
			{!! Form::text('pseudo_adh') !!}
		</li>
		<li>
			{!! Form::label('prenom_adh', 'Prenom_adh:') !!}
			{!! Form::text('prenom_adh') !!}
		</li>
		<li>
			{!! Form::label('dt_naiss_adh', 'Dt_naiss_adh:') !!}
			{!! Form::text('dt_naiss_adh') !!}
		</li>
		<li>
			{!! Form::label('photo_adh', 'Photo_adh:') !!}
			{!! Form::text('photo_adh') !!}
		</li>
		<li>
			{!! Form::label('descrip_adh', 'Descrip_adh:') !!}
			{!! Form::textarea('descrip_adh') !!}
		</li>
		<li>
			{!! Form::label('telephone_adh', 'Telephone_adh:') !!}
			{!! Form::text('telephone_adh') !!}
		</li>
		<li>
			{!! Form::label('cpt_instagram', 'Cpt_instagram:') !!}
			{!! Form::text('cpt_instagram') !!}
		</li>
		<li>
			{!! Form::label('cpt_facebook', 'Cpt_facebook:') !!}
			{!! Form::text('cpt_facebook') !!}
		</li>
		<li>
			{!! Form::label('cpt_rs_autre', 'Cpt_rs_autre:') !!}
			{!! Form::text('cpt_rs_autre') !!}
		</li>
		<li>
			{!! Form::label('ip_adh', 'Ip_adh:') !!}
			{!! Form::text('ip_adh') !!}
		</li>
		<li>
			{!! Form::label('is_admin', 'Is_admin:') !!}
			{!! Form::text('is_admin') !!}
		</li>
		<li>
			{!! Form::label('compte_id', 'Compte_id:') !!}
			{!! Form::text('compte_id') !!}
		</li>
		<li>
			{!! Form::label('profil_id', 'Profil_id:') !!}
			{!! Form::text('profil_id') !!}
		</li>
		<li>
			{!! Form::label('civilite_id', 'Civilite_id:') !!}
			{!! Form::text('civilite_id') !!}
		</li>
		<li>
			{!! Form::label('ville_id', 'Ville_id:') !!}
			{!! Form::text('ville_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}