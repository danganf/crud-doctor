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
                    <form>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="fulano dos santos">
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="crm">CRM</label>
                                    <input type="text" class="form-control" id="crm" name="crm" placeholder="123445 - RJ">
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="2199999999">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="specialty">
                                        Especialidade ( <small>Click com o CTR para selecionar + de 1</small> )
                                        <div v-if="!specialtys" class="lds-ellipsis spinnerSpecialty"><div></div><div></div><div></div><div></div></div>
                                    </label>
                                    <select multiple id="specialty" name="specialty" class="form-control">
                                        <option v-for="(reg, idx) in specialtys" :key="`c-reg-tr${idx}`">{{reg.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 save">
                                <button type="buttom" @click="save" class="btn btn-primary btn-round pull-right">Salvar</button>
                                <router-link :to="{ name: 'doctor-register', force: true }" tag="button" type="buttom" class="btn btn-info btn-round pull-right"> &laquo; Voltar</router-link>
                            </div>
                        </div>
                    </form>    
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
                preloader: false,
                specialtys: null,
            }
        },

        methods: {
            save(){
                console.log('SAVE');
            },
            async getSpecialty() {
                await window.axios.get(process.env.URL_API_BACKEND + 'specialty')
                .then((result) => {
                    this.specialtys = result.data
                }).catch(error => {

                })
            }
        },

        mounted(){
            this.getSpecialty();
        }
    }
</script>

<style scoped>
    label, select{text-transform: uppercase;}
    select{height: 450px;}
    select option{padding: 5px;cursor: pointer;}
    form .row{margin-bottom: 10px;}
    .spinnerSpecialty{top: -28px;}
    .save{background-color: #F4F3EF;margin: 0 0 0 6px;}
    button{margin-left: 10px;}
    ::placeholder {
        opacity: 0.4; /* Firefox */
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        opacity: 0.4;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
        opacity: 0.4;
    }
</style>