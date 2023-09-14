<template>
  <div class="container">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <h2>Listado de Categorías</h2>
        </div>
        <div class="col">
            <router-link :to="{name: 'nuevacategoria'}" class="btn btn-success btn-sm" > <i class="fa-solid fa-plus"></i></router-link>
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-lg-6 col-md-8 col-xl-6 col-sm-12">
            <div class="table-responsive">
                <table class="miTabla table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="tablaOption">#</th>
                            <th style="width: 85%;">Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(categoria, index) in categorias" :key="index">
                            <td class="tablaOption">{{index+1}}</td>
                            <td>{{categoria.nombre}}</td>
                            <td class="tablaOption edicon">
                                <i class="fa-solid fa-pencil" @click="router.push({path: `/admin/categorias/editar/${categoria.id}`})"></i>
                            </td>
                            <td class="tablaOption delicon"><i class="fa-solid fa-trash-can" @click="eliminalo(categoria.id)"></i></td>
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
    const categorias = ref([]);

    const getCategorias = () => {
        axios.get("/api/categorias")
        .then(response => {
            categorias.value = response.data;
        })
        .catch(error => {
            console.log(error);
        })
    }

    onMounted(()=> {
        getCategorias();
    })

    const eliminalo = (id) => {
        if(confirm("Desear eliminar esta categoría?")){
            axios.delete(`/api/categorias/${id}`)
            .then(response=> {
                if (response.data == "done"){
                    getCategorias();
                }else{
                    console.log(response.data);
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }

</script>

<style scoped>


</style>