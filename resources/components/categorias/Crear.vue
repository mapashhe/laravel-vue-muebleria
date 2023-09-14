<template>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col text-right">
                <button class="btn btn-sm btn-success" @click="router.go(-1)"><i class="fa-solid fa-arrow-left-long"></i></button>
            </div>
            <div class="col-auto">
                <h2>Crear Categoría</h2>
            </div>
            <div class="col">
            </div>
        </div>
        <form @submit.prevent="guardar">
            <div class="row align-items-center ">
                <div class="col">
                </div>
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <label for="nombre">Categoría: </label>
                                    <input type="text" id="nombre" v-model="nombre">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router'
import {ref} from 'vue'
    const router = useRouter();
    const nombre = ref("");

    const guardar = () => {
        axios.post("/api/categorias", {nombre: nombre.value})
        .then(response => {
            response.status == 200 ? router.go(-1) : console.log(response)
        })
        .catch(error => {
            console.log(error);
        })
    }

</script>

<style>

</style>