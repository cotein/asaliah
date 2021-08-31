import state from "./State";

const getters = {

    HasPerson(state){
        if (state.person == null) {
            return false;
        }

        return true;
    },

    WspucHasError(state){
        if (state.error == null) {
            return false;
        }

        return true;
    },

    GetPersonWSPUC(state){
        return state.person;
    },

    GetPersonWSPUCisArray(state, getters){

        if (state.person == null) {
            return false;
        }
        if (getters.GetPersonWSPUC.hasOwnProperty('idPersonaListReturn')) {
            if (Array.isArray(getters.GetPersonWSPUC.idPersonaListReturn.idPersona)) {
                console.log('es un array');
                return true;
            }

            return false;
        }

        return false;
    },

    HasDatosGenerales(state, getters){

        if (state.person != null) {
            
            console.log('state.person getersssss');
            console.log(state.person);
            console.log('state.person getersssss');

            if (getters.GetPersonWSPUCisArray) {
                return false;
            }

            if (state.person.personaReturn.hasOwnProperty('datosGenerales')) {
                
                return true;
            }
            
            return false;
        }

        return false
    },

    GetDatosGenerales(state){
        return state.person.personaReturn.datosGenerales;
    },

    HasDatosRegimenGeneral(state, getters){

        if (state.person != null) {
            
            if (getters.GetPersonWSPUCisArray) {
                return false;
            }

            if (state.person.personaReturn.hasOwnProperty('datosRegimenGeneral')) {
                
                return true;
            }
            
            return false;
        }

        return false
    },

    GetDatosRegimenGeneral(state){
        return state.person.personaReturn.datosRegimenGeneral;
    },

    HasDatosMonotributo(state, getters){

        if (state.person != null) {
            
            if (getters.GetPersonWSPUCisArray) {
                return false;
            }

            if (state.person.personaReturn.hasOwnProperty('datosMonotributo')) {
                
                return true;
            }
            
            return false;
        }

        return false
    },

    GetDatosMonotributo(state){
        return state.person.personaReturn.datosMonotributo;
    },

    /**
     * Cuando la respuesta contiene algún error de AFIP
     * Ej. No tiene dependencia informada",
     * "Tu constancia se encuentra bloqueada"
     * 
     */
    HasErrorConstancia(state){

        if (state.person != null) {
            
            if (state.person.personaReturn.hasOwnProperty('errorConstancia')) {
                
                return true;
            }
            
            return false;
        }

        return false
    },

    GetErrorConstancia(state){
        return state.person.personaReturn.errorConstancia;
    },

    GetDniSearch(state) {
        state.dni_search;
    }
}

export default getters;