<template>
<div class="modal fade" id="savepregunta" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="savepregunta">Agregar Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent = "savepregunta">
	        <div class="form-group">
			    <label>Pregunta</label>
			    <input type="text" class="form-control" placeholder="pregunta" v-model="pregunta">
		  	</div>
            <div class="form-group">
			    <label>Peso</label>
			    <input number="text" class="form-control" placeholder="peso de la pregunta" v-model="peso">
		  	</div>
            <div class="form-group">
			    <label>Tipo de Pregunta</label>
			    <input type="text" class="form-control" placeholder="tipo de pregunta" v-model="tipo">
		  	</div>
        
		  	<button type="submit" class="btn btn-primary">Guardar</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    import EventBus from '../event-bus2';
export default {
    data(){
        return{
            pregunta: null,
            peso: null,
            tipo: null,
            ciudad: null
        }
    },

    methods:{
        savepregunta: function(){
            axios.post('http://roles.com/preguntas',{
               pregunta:    this.pregunta,
               peso:        this.peso,
               tipo:        this.tipo
            })
            .then(function(res){
                $('#savepregunta').modal('hide')
                EventBus.$emit('pregunta-added',res.data.pregunta)
                
            })
            .catch(function(err){
                console.log(err)
            });
        }
    }
}
</script>
<style>

</style>
