import {createRouter, createWebHistory} from 'vue-router';

const contacto = () => import('../components/Contacto.vue')
const webpage = () =>  import('../components/Home.vue') 

const mostrarCate = () =>  import('../components/categorias/Mostrar.vue') 
const nuevaCate = () =>  import('../components/categorias/Crear.vue') 
const editarCate = () =>  import('../components/categorias/Editar.vue') 


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

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;