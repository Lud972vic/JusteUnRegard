{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('lib_acc_pub', 'Lib_acc_pub:') !!}
			{!! Form::text('lib_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('desc_acc_pub', 'Desc_acc_pub:') !!}
			{!! Form::textarea('desc_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('dt_debut_acc_pub', 'Dt_debut_acc_pub:') !!}
			{!! Form::text('dt_debut_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('dt_fin_acc_pub', 'Dt_fin_acc_pub:') !!}
			{!! Form::text('dt_fin_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('statut_visibilite_acc_pub', 'Statut_visibilite_acc_pub:') !!}
			{!! Form::text('statut_visibilite_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('url_img_1_acc_pub', 'Url_img_1_acc_pub:') !!}
			{!! Form::text('url_img_1_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('url_img_2_acc_pub', 'Url_img_2_acc_pub:') !!}
			{!! Form::text('url_img_2_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('url_img_3_acc_pub', 'Url_img_3_acc_pub:') !!}
			{!! Form::text('url_img_3_acc_pub') !!}
		</li>
		<li>
			{!! Form::label('typeannonce_id', 'Typeannonce_id:') !!}
			{!! Form::text('typeannonce_id') !!}
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