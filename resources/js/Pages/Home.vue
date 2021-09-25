<template>
    <layout>
        <div class='container'>
            <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
                {{ $page.props.flash.message }}
            </div>
            <div id='list' class='row'>
            <div class='table-responsive col-md-12' style='background-color: white;'>
                <table class='table table-striped' cellspacing='0' cellpadding='0'>
                    <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>Telefone:</th>
                            <th class='actions'>Ações:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in data" :key="row.id">
                            <td>{{ row.name }}</td>
                            <td>{{ row.email }}</td>
                            <td>{{ row.cellphone }}</td>
                            <td></td>
                            <td class='actions'>
                                <a class='btn btn-warning btn-xs' @click="edit(row)" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" >Editar</a>
                                <a class='btn btn-danger btn-xs'  @click="deleteR(row)" >Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                          <form>
                          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                      <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Seu Nome" v-model="form.name">
                                      <div v-if="errors.name" class="text-red-500">{{ errors.name }}</div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                      <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Seu Email" v-model="form.email">
                                      <div v-if="errors.email" class="text-red-500">{{ errors.email }}</div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Telefone:</label>
                                      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput" placeholder="Seu Telefone" v-model="form.cellphone" >
                                      <div v-if="errors.cellphone" class="text-red-500">{{ errors.cellphone }}</div>
                                  </div>
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" @click="update(form)">
                                Salvar
                              </button>
                            </span>

                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancelar
                              </button>
                            </span>

                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

        </div>
    </div>
</div>
        
    </layout>
</template>

<script>
import Layout from '../Layout'
import { data } from './Inserir'
export default {
    props: { 
        errors: Object,
        data },

    components: {Layout},

    data () {
      return {
        isOpen: false,

        form: {
            name: null,

            email: null,

            cellphone: null
        }
        };
    },



    methods: {

        openModal: function () {

            this.isOpen = true;

        },

        closeModal: function () {

            this.isOpen = false;

            this.reset();


        },

        edit: function (data) {

            this.form = Object.assign({}, data);

            this.openModal();
        },

        reset: function () {

            this.form = {

                name: null,

                email: null,

                cellphone: null,
            }

        },

        update: function (data) {

            data._method = 'PUT';

            this.$inertia.post('/' + data.id, data)

            this.reset();

            this.closeModal();

        },

        deleteR: function (data) {

            if (!confirm('Tem certeza que quer remover?')) return;

            data._method = 'DELETE';

            this.$inertia.post('/' + data.id, data)

            this.reset();

            this.closeModal();

        },
    },
};
</script>