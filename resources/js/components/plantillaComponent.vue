<template>
    <div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Plantillas
                 
                   <!-- verificar si tiene permisos. -->
                   
                  <addplantilla-component></addplantilla-component>
                </div>
                <div class="card-body">
                   <table class="table table-scriped table-hover" >
                       <thead>
                           <tr>
                               <th WIDTH="10px">
                                   ID
                               </th>
                               <th>Descripcion</th>
                               <th>Auditor</th>
                               <th>Gestion</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                     
                       <tbody v-for="plantilla in plantilla" :key="plantilla.id" :plantilla="plantilla">
                     
                                <tr>
                                    <td>{{ plantilla.id }}</td>
                                    <td>{{ plantilla.nombre }}</td>
                                    <td>{{ plantilla.descripcion }}</td>
                                    <td>{{ plantilla.gestion }}</td>
                                    
                                    <td WIDTH="5px">
                                      

                                        <a href="" 
                                            class="btn btn-sm btn-default">Ver</a>
                                     
                                    </td>

                                    
                                    <td WIDTH="5px">
                                     <addpregunta-component></addpregunta-component>
                                    </td>
                                    
                                    <td WIDTH="5px">
                                   
                                 

                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                  
                                    
                                 
                                    </td>

                                </tr>
                      
                       </tbody>

                   </table>
                  
                </div>
            
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
            plantilla: []
        }
    },
    created(){
        EventBus.$on('plantilla-added', data => {
            this.plantilla.push(data)
        })
    },
      mounted() {
            axios
                .get('http://roles.com/plantillas')
                .then((res) => {
                    this.plantilla = res.data
                    this.cargando = false
                    })
        }
    
}
</script>
<style>

</style>
