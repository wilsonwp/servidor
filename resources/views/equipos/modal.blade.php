<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">
        <h3>Esta Seguro de Eliminar el Equipo?</h3>
      </div>
      <div class="modal-footer">
      {!!link_to('#', $title='Si', $attributes = ['id'=>'si', 'class'=>'btn btn-danger','onclick'=>'eliminar()'], $secure = null)!!}
       {!!link_to('#', $title='No', $attributes = ['id'=>'no', 'class'=>'btn btn-primary','onclick'=>'volver()'], $secure = null)!!}
      </div>
    </div>
  </div>
</div>