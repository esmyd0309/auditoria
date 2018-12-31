<template>
<div class="modal fade" id="saveplantilla" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Plantilla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent = "saveplantilla">
	        <div class="form-group">
			    <label>Nombre</label>
			    <input type="text" class="form-control" placeholder="Ingresa el nombre del plantilla" v-model="nombre">
		  	</div>
            <div class="form-group">
			    <label>Descripcion</label>
			    <input type="text" class="form-control" placeholder="Ingresa el descripcion de la plantilla" v-model="descripcion">
		  	</div>
            <div class="form-group">
			    <label>Gestion</label>
			    <input type="text" class="form-control" placeholder="Ejem.. Cobranza o Ventas" v-model="gestion">
		  	</div>
            <div class="form-group">
			    <label>Ciudad</label>
			    <input type="text" class="form-control" placeholder="Ejem.. Guayaquil" v-model="ciudad">
		  	</div>

		  	<div class="form-group">
			    <label>Calificacion Maxima</label>
			    <input type="number" class="form-control" placeholder="50 a 100" v-model="maxima_calificacion">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Save</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
    import EventBus from '../event-bus';
export default {
    data(){
        return{
            nombre: null,
            descripcion: null,
            gestion: null,
            ciudad: null,
            maxima_calificacion: null
        }
    },

    methods:{
        saveplantilla: function(){
            axios.post('http://roles.com/plantillas',{
               nombre:      this.nombre,
               descripcion: this.descripcion,
               gestion:     this.gestion,
               ciudad:      this.ciudad,
               maxima_calificacion: this.maxima_calificacion
            })
            .then(function(res){
                $('#saveplantilla').modal('hide')
                EventBus.$emit('plantilla-added',res.data.plantilla)
                
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
