<template >
    <layout>


        <div class="container">
			
			<form @submit.prevent="handleForm">
				<div>
					<h1>CADASTRO DE USUÁRIO</h1>
				</div>
		
				<div>
					<label >Nome do Contato</label>
					<input type='text' v-model="form.name" placeholder='ex: João Silva'>
				</div>

				<div>
					<label>Email</label>
					<input type='email' v-model="form.email" placeholder='ex: exemplo@dominio.com'>
				</div>

				<div>
					<label>Telefone</label>
					<input type='text' v-model="form.cellphone" placeholder='ex: (85)970204952'>
				</div>
		
				<div>
				</div>
				<button type='submit'>CADASTRAR</button>
    		</form>
		</div>
			
    </layout>
</template>

<script>

import Layout from '../Layout'

export default {

    components: {Layout},

    props: {
		errors: Object,
	},

    data: () => {
        return {

            form: {
                name: null,

                email: null,

                cellphone: null
            },
        };
    },


    methods: {
        handleForm(){

            this.$inertia.post('/inserir', this.form);
        }
    },
};

</script>

<style>
    
</style>