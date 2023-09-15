import {createRouter, createWebHistory} from 'vue-router';

const contacto = () => import('../components/Contacto.vue')
const webpage = () =>  import('../components/Home.vue') 

const mostrarCate = () =>  import('../components/categorias/Mostrar.vue') 
const nuevaCate = () =>  import('../components/categorias/Crear.vue') 
const editarCate = () =>  import('../components/categorias/Editar.vue') 

const mostrarMueble = () =>  import('../components/muebles/Mostrar.vue')
const nuevoMueble = () =>  import('../components/muebles/Crear.vue')
const editarMueble = () =>  import('../components/muebles/Editar.vue')


const routes = [

    {
        name: "webpage",
        path: "/",
        component: webpage
    },
    {
        name: "contacto",
        path: "/contacto",
        component: contacto
    },


    {
        name: "vercategorias",
        path: "/admin/categorias/ver",
        component: mostrarCate
    },
    {
        name: "nuevacategoria",
        path: "/admin/categorias/crear",
        component: nuevaCate
    },
    {
        name: "editarcategoria",
        path: "/admin/categorias/editar/:id",
        component: editarCate,
        props: true
    },


    {
        name: "vermuebles",
        path: "/admin/muebles/ver",
        component: mostrarMueble
    },
    {
        name: "nuevomueble",
        path: "/admin/muebles/crear",
        component: nuevoMueble
    },
    {
        name: "editarmueble",
        path: "/admin/muebles/editar/:id",
        component: editarMueble,
        props: true
    },



]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;