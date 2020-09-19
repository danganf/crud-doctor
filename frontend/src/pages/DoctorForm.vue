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
                                    <label for="name">Nome*</label>
                                    <input type="text" class="form-control" ref="name" id="name" name="name" 
                                    v-model.trim="$v.doctor.name.$model"
                                    @blur='mix_inputCheckIsValid($v.doctor.name, $event)'
                                    placeholder="fulano dos santos">
                                    <div class="error">Obrigatório</div>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="crm">CRM*</label>
                                    <input type="text" class="form-control" id="crm" name="crm"
                                    v-model.trim="$v.doctor.crm.$model"
                                    @blur='mix_inputCheckIsValid($v.doctor.crm, $event)'
                                    placeholder="123445 - RJ">
                                    <div class="error">Obrigatório</div>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="phone">Telefone* ( <small>8 ou 9 digitos )</small></label>
                                    <input type="tel" v-mask="['(##) ####-####', '(##) #####-####']" class="form-control" id="phone" name="phone" 
                                    v-model.trim="$v.doctor.phone.$model"
                                    @blur='mix_inputCheckIsValid($v.doctor.phone, $event)'
                                    placeholder="2199999999">
                                    <div class="error">Obrigatório</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="specialty">
                                        Especialidade* ( <small>Click com o <strong>CTR</strong> para selecionar + de 1</small> )
                                        <div v-if="ttSpecialtys === 0" class="lds-ellipsis spinnerSpecialty"><div></div><div></div><div></div><div></div></div>
                                    </label>
                                    <select multiple id="specialty" name="specialtys" class="form-control" 
                                    v-model.trim="$v.doctor.specialtys.$model"
                                    @blur='mix_inputCheckIsValid($v.doctor.specialtys, $event)'>
                                        <option v-for="(reg, idx) in specialtys" :key="`c-reg-tr${idx}`" :value="reg.id">{{reg.name}}</option>
                                    </select>
                                    <div class="error">Obrigatório</div>
                                </div>
                            </div>
                        </div>
                        <div class="row save">
                            <div class="col-md-5">
                                <transition name="fade">                                    
                                    <div v-if="msgError" class="session-msg session-error">
                                        <span><strong>Ops!</strong> {{msgError}}</span>
                                    </div>
                                </transition>
                            </div>
                            <div class="col-md-7">
                                <button type="buttom" @click.stop.prevent="save($event)" :disabled="disabled" class="btn btn-primary btn-round pull-right">Salvar</button>
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
    
    import { mapState, mapActions, mapGetters } from 'vuex';
    import {mask} from 'vue-the-mask'
    import {validationMixin} from 'vuelidate' 
    import {doctorModel} from '@/models/doctor'
    import {inputCheckIsValid} from "@/mixins/validate"
    import {mixMsgAwait, MixMsgNotify} from "@/mixins/helpers"

    export default {
        props:{},

        directives: {mask},

        mixins: [ 
            validationMixin, 
            doctorModel.validate(),
            mixMsgAwait,
            MixMsgNotify,
            inputCheckIsValid
        ],

        data(){
            return {
                preloader: false,
                id: null,
                doctor: new doctorModel(),
                msgError: null,
                disabled: true,
            }
        },

        updated() {
            this.$v.$touch()
            this.disabled = this.$v.$invalid
        },

        methods: {
            ...mapActions( 'Specialty', [ 'setSpecialty' ] ),
            async save(e){
                if( !this.preloader ) {
                    this.$v.$touch();
                    if (this.$v.$invalid) {                    
                        this.mix_setMsgAwait( 'Verifique os campos obrigatórios' )
                        return;
                    }
                    
                    this.preloader = true
                    this.msgError = null

                    try{
                        this.disabled = true
                        const text = e.target.innerHTML
                        e.target.innerHTML = 'Processando...'
                        let result = null
                        if( !this.id ){
                            result = (await window.axios.post(process.env.URL_API_BACKEND +'doctor', this.doctor.toObjData() ) )
                        } else {
                            result = (await window.axios.put(process.env.URL_API_BACKEND +'doctor/'+this.id, this.doctor.toObjData() ) )
                        }

                        if( result.status === 200 ) {
                            this.mix_msgNotify( result.data.messages )
                            this.preloader = false
                            this.doctor.resetAttr()
                            e.target.innerHTML = 'Finalizando...'
                            this.$router.push({name: 'doctor-register'})
                        }

                    } catch(error){
                        this.preloader = false
                        this.msgError = error.response.data.messages
                        e.target.innerHTML = text
                    }

                }

            },
            async getDoctor(id) {                
                this.preloader = true
                await window.axios.get(process.env.URL_API_BACKEND + 'doctor/' + id)
                .then((result) => {
                    result.data.specialtys = result.data.specialtys.map( row => row.specialty_id )
                    this.doctor.setdata( result.data )
                    this.preloader = false
                    this.id = +id
                }).catch(error => {

                })
            }
        },

        mounted(){
            
            this.$refs.name.focus()

            this.setSpecialty()
        
            if( typeof this.$route.params.id !== 'undefined'){
                this.getDoctor(this.$route.params.id)                
            }
        },

        computed: {
            ...mapState( 'Specialty', [ 'specialtys' ] ),
            ...mapGetters( 'Specialty', [ 'ttSpecialtys' ] ),
        }
    }
</script>

<style scoped>
    label, select{text-transform: uppercase;}
    select{height: 450px;}
    select option{padding: 5px;cursor: pointer;}
    form .row{margin-bottom: 14px;}
    .spinnerSpecialty{top: -28px;}
    .spinner{top: -17px;right: 24px;}
    .save{background-color: #F4F3EF;margin: 0 0 0 6px;}
    button{margin-left: 10px;}
    .error{color: red;font-style: italic;display: none;border: none !important;margin-top: 3px;position: absolute;}
    .session-error{color: #f1926e;line-height: 58px;animation: shake 0.3s;animation-iteration-count: 3;}
    .session-error span{border-bottom: 1px dashed #f1926eed;padding: 0 5px 5px 3px;}
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