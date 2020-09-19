<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card search">
                <div class="card-header">
                    Digite e pressione ENTER para buscar
                    <div v-if="preloader" class="lds-ellipsis spinner"><div></div><div></div><div></div><div></div></div>
                </div>
                <div class="card-body">
                    <input type="text" ref="search" v-model="term" @keyup.enter="search" class="form-control" id="search" name="search" placeholder="Busca por nome ou crm">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
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
                                        <button type="button" @click="del($event, reg.id, reg.name)" class="btn btn-danger">Excluir</button>
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
            preloader: false,
            term: '',
            termAnt: '',
        }
    },

    methods: {
        async getDoctor () {
            this.preloader = true
            await window.axios.get(process.env.URL_API_BACKEND + 'doctor?q='+this.term)
            .then((result) => {
                this.preloader = false
                this.registers = result.data
            }).catch(error => {
                this.preloader = false
            })
        },
        search(){
            if( this.term !== this.termAnt ){
                this.getDoctor()
                this.termAnt = this.term
            }
        },
        del(e, id, name){
            
             var myhtml = document.createElement("p");
             myhtml.innerHTML = 'Você está prestes a deletar o registro:<br/><strong>'+name+'</strong><br/><br/>ESSA AÇÃO NÃO PODERÁ SER DESFEITA!!!';
            
            this.$swal({
                title: 'Tem certeza?',
                content: myhtml,                
                buttons: {
                    cancel: true,
                    confirm: "Sim, quero continuar!",
                }
                }).then((result) => {
                    if(result) {
                        window.axios.delete(process.env.URL_API_BACKEND + 'doctor/'+id)
                        .then((result) => {
                            this.$swal('Sucesso', 'O registros deletado!', 'success')
                            e.target.parentNode.parentNode.remove()
                        }).catch(error => {
                            this.$swal('Ops!', 'Ocorreu um problema', 'success')
                        })                        
                    }
                })


        }
    },

    mounted(){
        this.getDoctor()
        this.$refs.search.focus()
    }
}
</script>

<style scoped>
    th{text-transform: uppercase;}
    th:last-child, td:last-child{text-align: right;}
    .spinner{top: -13px;}
    div.search .card-body {padding-top: 5px;}
    div.search #search {padding: 15px;font-size: 1.5em;font-weight: 700;}
    ::placeholder {
        opacity: 0.3; /* Firefox */
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        opacity: 0.3;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
        opacity: 0.3;
    }
</style>