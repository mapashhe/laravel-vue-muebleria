<template>
  <div class="container">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <h2>Listado de Muebles</h2>
        </div>
        <div class="col">
            <router-link :to="{name: 'nuevomueble'}" class="btn btn-success btn-sm" > <i class="fa-solid fa-plus"></i></router-link>
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="miTabla table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="tablaOption">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Ingresado</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(mueble, index) in muebles" :key="index">
                            <td class="tablaOption">{{index+1}}</td>
                            <td>{{mueble.nombre}}</td>
                            <td>{{ mueble.descripcion }}</td>
                            <td>{{ mueble.precio }}</td>
                            <td>{{ mueble.categorias.nombre }}</td>
                            <td @click="formatDate(mueble.creado)">{{ formatDate(mueble.creado) }}</td>
                            <td class="tablaOption" :class="mueble.disponible ==1 ? 'pesoverde' : 'pesogris'" @click="switchSell($event, mueble.id)"><i class="fa-solid fa-dollar-sign"></i></td>
                            <td class="tablaOption edicon" @click="router.push({path: `/admin/muebles/editar/${mueble.id}`})">
                                <i class="fa-solid fa-pencil"></i>
                            </td>
                            <td class="tablaOption delicon" @click="eliminalo(mueble.id)"><i class="fa-solid fa-trash-can"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
  </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';


    const router = useRouter();
    const muebles = ref([]);

    const getMuebles = () => {
        axios.get("/api/muebles")
        .then(response => {
            muebles.value = response.data;
        })
        .catch(error => {
            console.log(error);
        })
    }
    const switchSell = (event, id) => {
        if(confirm("Desea marcar como vendido el mueble?")){
            axios.get(`/api/muebles/vender/${id}`)
            .then(response => {
                getMuebles();
            })
            .catch(error => {
                console.log(error);
            })
        }
    }

    onMounted(()=> {
        getMuebles();
    })

    const eliminalo = (id) => {
        if(confirm("Desear eliminar este mueble?")){
            axios.delete(`/api/muebles/${id}`)
            .then(response=> {
                if (response.data == "ok"){
                    getMuebles();
                }else{
                    console.log(response.data);
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }

    const formatDate = (date) => {
      const fecha = new Date(date);
      const dia = ("0"+fecha.getDay()).slice(-2);
      const mes = ("0"+fecha.getMonth()).slice(-2);
      const hora = ("0"+fecha.getHours()).slice(-2);
      const minuto = ("0"+fecha.getMinutes()).slice(-2);
      return `${dia}/${mes}/${fecha.getFullYear()} ${hora}:${minuto}`;
    }

</script>

<style scoped>

.pesoverde{
    color: rgb(47, 215, 47);
}
.pesoverde:hover{
    color: rgb(224, 224, 23);
}
.pesogris{
    color: gray;
}
.pesogris:hover{
    color: rgb(47, 215, 47);
}
</style>