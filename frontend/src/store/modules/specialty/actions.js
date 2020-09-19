const setSpecialty = ( { commit }, obj ) => {    
    window.axios.get( process.env.URL_API_BACKEND + 'specialty')
        .then(( result ) => {
            commit('SET_LIST', result.data );            
        }).catch(error => {
            console.log(error.response.data.messages);
        });
};

export default {
    setSpecialty
};
