<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <div v-if="preloader" class="lds-ellipsis spinner"><div></div><div></div><div></div><div></div></div>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="pull-right">
                        <router-link :to="{ name: 'new-doctor', force: true }" tag="button" type="button" class="btn btn-md btn-success">Novo</router-link>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-hover">
                            <thead class=" text-primary">
                                <th scope="col">#</th>                                
                                <th scope="col">nome</th>                                
                                <th scope="col">crm</th>                                
                                <th scope="col">telefone</th>                                
                                <th scope="col">ações</th>                                
                            </thead>
                            <tbody>
                                <tr v-for="(reg, idx) in registers" :key="`c-reg-tr${idx}`">
                                    <td>{{reg.id}}</td>
                                    <td>{{reg.name}}</td>
                                    <td>{{reg.crm}}</td>
                                    <td>{{reg.phone}}</td>
                                    <td>
                                        <router-link :to="{ name: 'edit-doctor', force: true, params: {id:  reg.id} }" tag="button" type="button" class="btn btn-info">Editar</router-link>
                                        <button type="button" @click="del(reg.id)" class="btn btn-danger">Excluir</button>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{},

    data(){
        return {
            registers: [],
            preloader: false
        }
    },

    methods: {
        async getDoctor () {
            this.preloader = true
            await window.axios.get(process.env.URL_API_BACKEND + 'doctor')
            .then((result) => {
                this.preloader = false
                this.registers = result.data
            }).catch(error => {
                this.preloader = false
            })
        },
        del(id){
            console.log('DEL', id);
        }
    },

    mounted(){
        this.getDoctor()
    }
}
</script>

<style scoped>
    th{text-transform: uppercase;}
    th:last-child, td:last-child{text-align: right;}
    .spinner{top: -13px;}
</style>