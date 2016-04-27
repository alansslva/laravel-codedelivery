<?php $list_status = [0 => 'Pendente', 1 => 'A Caminho', 2 => 'Entregue'] ?>

<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::select('status', $list_status ,null , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('user_deliveryman_id','Status') !!}
    {!! Form::select('user_deliveryman_id', $deliverymans ,null , ['class' => 'form-control']) !!}
</div>