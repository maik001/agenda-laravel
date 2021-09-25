<template >
    <layout>


        <div class="container">
			<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-4'>
				<form class='form-signup' style='padding-top: 7px;' @submit.prevent="handleForm">
      		<div class='text-center mb-4'>
        		<h1 class='h1 mb-3 font-weight' style='color:#00ace6;'>CADASTRO DE CONTATOS</h1>
      		</div>
	
      		<div class='form-label-group'>
      			<label style='color:#00ace6;'>Nome do Contato</label>
        		<input type='text' class='form-control' v-model="form.name" placeholder='ex: João Silva'>
				<div v-if="errors.name" class="alert alert-danger" role="alert">{{ errors.name }}</div>
        	</div>

      		<div class='form-label-group'>
      			<label style='color:#00ace6;'>Email</label>
        		<input type='email' class='form-control' v-model="form.email" placeholder='ex: exemplo@dominio.com'>
				<div v-if="errors.email" class="alert alert-danger" role="alert">{{ errors.email }}</div>
      		</div>

      		<div class='form-label-group'>
      			<label style='color:#00ace6;'>Telefone</label>
        		<input type='text' class='form-control' v-model="form.cellphone" placeholder='ex: (85)970204952'>
				<div v-if="errors.cellphone" class="alert alert-danger" role="alert">{{ errors.cellphone }}</div>
      		</div>
    
      		<div class='checkbox mb-3'>
      		</div>
      		<button class='btn btn-lg btn-primary btn-block' type='submit'>CADASTRAR</button>
    			</form>
				</div>
			
			<div class='col-md-1'></div>
			</div>
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