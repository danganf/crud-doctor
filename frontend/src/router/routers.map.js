import List from  '../pages/List'
import DoctorForm from  '../pages/DoctorForm'

export default [

    {
        path: '/',
        component: List,
        name: 'doctor-register',
        meta: {
            title: 'Doutores cadastrados'
        }
    },
    {
        path: '/doctor/new',
        component: DoctorForm,
        name: 'new-doctor',
        meta: {
            title: 'Novo doutor'
        }
    },
    {
        path: '/doctor/edit/:id',
        component: DoctorForm,
        name: 'edit-doctor',
        meta: {
            title: 'Alterando doutor'
        }
    }

]