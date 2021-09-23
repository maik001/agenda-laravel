<template>
    <layout>
        <div>
            Olá {{ user }}, Você está na Home
        </div>
    </layout>
</template>
<script>
import Layout from '../Layout'
export default {
    props:
    {
        user: String
    },
    components: {Layout},
};
</script>
<style>
    
</style>