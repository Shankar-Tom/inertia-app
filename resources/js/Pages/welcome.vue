<template>
        <h1 class="bg-danger">Hiiii {{name}} , How are you ?</h1>
        <Link href="/second">Second page</Link>
        <Link href="/third">Third page</Link>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    components:{
        Link
    },
    props:{
        name:String
    },
    data(){

    }
}
</script>