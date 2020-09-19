import {required, minLength} from 'vuelidate/lib/validators'
import {isCelPhone} from "@/util/validates";
import {modelContract} from "@/util/modelContract"

const attrs = {
    name: {required, minLength: minLength(4)},
    crm: {required, minLength: minLength(2)},
    phone: {required, isCelPhone},
    specialtys: {required},
};

export class doctorModel extends modelContract{

    constructor(data) {
        super( attrs, data)
        this.set('specialtys', [])
    }

    static validate(){
        return { validations: {doctor: attrs } }
    }

}