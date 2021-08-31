const getters = {

    HasCompany(state){

        if(!  _.isEmpty(state.company) ){

            return true;
        }
        
        return false;
    },

    GetCompany(state)
    {
        return state.company;
    }
    
}

export default getters;