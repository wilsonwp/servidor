<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Resultado</h4>
      </div>
      <div class="modal-body">
      
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" id="id">
          <input type="hidden" id="resultado_id">
        <input type="hidden" id="user_id" value="{{Auth::user()->id}}" >
        
      @include('partidos.forms.camp-marcador')
        
      </div>
        <div>
      {!!link_to('#', $title='Actualizar Marcador', $attributes = ['id'=>'actMarcador', 'class'=>'btn btn-primary'], $secure = null)!!}
      </div>
        <div class="modal-footer"><table class="table" id="contenido">
    <thead><caption>Marcador</caption></thead>
                    <tbody></tbody>
        </table></div>
        
    </div>
  </div>
</div>