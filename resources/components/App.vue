<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="https://es.vuejs.org/images/logo.png" width="25" height="25">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link :to="{name: 'webpage'}" class="nav-link">Inicio</router-link>
                </li>
                <li class="nav-item">
                    <router-link  :to="{name: 'contacto'}" class="nav-link">Contacto</router-link>
                </li>
                <li class="nav-item">
                    <router-link  :to="{name: 'vercategorias'}" class="nav-link">Categorías</router-link>
                </li>
                <li class="nav-item">
                    <router-link  :to="{name: 'vermuebles'}" class="nav-link">Muebles</router-link>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </nav>
        <router-view/>
</template>

<script setup>

</script>

<style scoped>

</style>