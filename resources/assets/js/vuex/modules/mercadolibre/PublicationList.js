import collect from 'collect.js'
export default {
    state : {
        publications : []
    },
    
    mutations : {
       
        PUBLICATION_LIST_SET_PUBLICATIONS(state, value)
        {
            state.publications = value;
        }
    },

    actions : {

        

    },

    getters : {
        
        PublicationListGetter(state)
        {
            return state.publications;
        }
        
    }

}