<template>
  <div class="container">
      <div class="row justify-content-center align-items-center">
          <div class="col text-right">
              <button class="btn btn-sm btn-success" @click="router.go(-1)"><i class="fa-solid fa-arrow-left-long"></i></button>
          </div>
          <div class="col-auto">
              <h2>Ingresar Mueble</h2>
          </div>
          <div class="col">
          </div>
      </div>
      <form @submit.prevent="guardar">
          <div class="row align-items-center ">
              <div class="col"></div>

              <div class="col-5">
                  <div class="card">
                      <div class="card-body">
                            <form @submit.prevent="guardar">
                              <div class="row">
                                <div class="col">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" id="nombre" v-model="mueble.nombre">
                                </div>
                                <div class="col">
                                  <label for="precio">Precio</label>
                                  <input type="text" class="form-control" id="precio" v-model="mueble.precio">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <label for="descripcion">Descripción</label>
                                  <textarea class="form-control" id="descripcion" rows="3" v-model="mueble.descripcion"></textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <label for="cate">Categoría</label>
                                  <select class="form-control" id="cate" v-model="mueble.id_categoria">
                                    <option v-for="(categoria, index) in categorias" v-bind:value="categoria.id" :key="index">
                                      {{ categoria.nombre }}
                                    </option>
                                  </select>
                                </div>
                              </div>

                              <div class="row align-items-center">
                                <div class="col text-center">
                                  <button class="submit btn btn-sm btn-success "><i class="fa-regular fa-floppy-disk"></i></button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              
              
              <div class="col-5">

                <div class="row">
                  <div class="col text-center ">
                    <div class="card" style="width: 10rem;">
                      <img class="card-img-top img-card" :src="mueble.foto1" referrerpolicy="no-referrer">
                      <div class="card-body">
                         <label class="custom-file-upload">
                            <input type="file" accept="image/*" @change="uploadImage($event, 1)"/>
                            Subir foto
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col text-center ">
                    <div class="card" style="width: 10rem;">
                      <img class="card-img-top img-card" :src="mueble.foto2" referrerpolicy="no-referrer">
                      <div class="card-body">
                         <label class="custom-file-upload">
                            <input type="file" accept="image/*" @change="uploadImage($event, 2)"/>
                            Subir foto
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="col text-center ">
                    <div class="card" style="width: 10rem;">
                      <img class="card-img-top img-card" :src="mueble.foto3" referrerpolicy="no-referrer">
                      <div class="card-body">
                         <label class="custom-file-upload">
                            <input type="file" accept="image/*" @change="uploadImage($event, 3)"/>
                            Subir foto
                        </label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col text-center ">
                    <div class="card" style="width: 10rem;">
                      <img class="card-img-top img-card" :src="mueble.foto4" referrerpolicy="no-referrer">
                      <div class="card-body">
                         <label class="custom-file-upload">
                            <input type="file" accept="image/*" @change="uploadImage($event, 4)"/>
                            Subir foto
                        </label>
                      </div>
                    </div>
                  </div>
                </div>


              

              </div>
              <div class="col"></div>
          </div>
      </form>
  </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";

  const props = defineProps(["id"]);
  const router = useRouter();
  const mueble = ref({
    foto1: "",
    foto2: "",
    foto3: "",
    foto4: "",
    nombre: "",
    descripcion: "",
    precio: "",
    id_categoria: ""
  });
  const categorias = ref([]);

  const guardar = () => {
    axios.put(`/api/muebles/${props.id}`, mueble.value)
    .then(response => {
      // response.status == 200 ? router.go(-1) : console.log(response);
      console.dir(response.data)

    })
  }

  const getCategorias = () => {
    axios.get("/api/categorias")
    .then(response => {
      categorias.value = response.data;
      mueble.value = {
        ...mueble.value,
        id_categoria: mueble.value.id_categoria
      }
    })
    .catch(error => {
      console.log(error)
    })
  }

  const uploadImage = (event, who) => {
    console.log(who);
    if (!event.target.files || !event.target.files[0]){
      return;
    }
    var formdata = new FormData();
    formdata.append('image', event.target.files[0]);
    
    axios({
      url: 'https://api.imgur.com/3/upload',
      method: 'POST',
      headers: {
        Authorization: "Client-ID "+import.meta.env.VITE_IMGUR_CLIENT_ID
      },
      data: formdata
      })
    .then(res => {
      let dis = who == 1 ? "foto1" : who == 2 ? "foto2" : who == 3 ? "foto3" : "foto4";
      mueble.value[dis] = res.data.data.link;
    })
  }

  const getMueble = () => {
    axios.get(`/api/muebles/${props.id}`)
    .then(response => {
      mueble.value = response.data;
    })
  }

onMounted(()=>{
  getMueble();
  getCategorias();
})
</script>

<style scoped>
  .row {
    padding-top: 10px;
  }

  .img-card{
    max-width: 10rem;
    max-height: 6rem;
    min-width: 10rem;
    min-height: 6rem;
  }
  .fa-upload{
    color:white;
  }
  input[type="file"] {
    display: none;
  }
  .custom-file-upload {
    background: #29a744;
    color: white;
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
  }
  .custom-file-upload:hover {
    background: #218939;
    color: white;
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
  }
</style>