<template>
    <layout>
        <div class='container'>
            <div id='list' class='row'>
            <div class='table-responsive col-md-12' style='background-color: white;'>
                <table class='table table-striped' cellspacing='0' cellpadding='0'>
                        <tr>
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>Telefone:</th>
                            <th class='actions'>Ações:</th>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>Telefone</td>
                            <td class='actions'>
                                <a class='btn btn-warning btn-xs'>Editar</a>
                                <a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#delete-modal'>Excluir</a>
                            </td>
                        </tr>
                </table>
            </div>
            </div>
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