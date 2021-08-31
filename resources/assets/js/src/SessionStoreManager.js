
class SessionStoreManager {

    constructor(){

        this.ST = window.sessionStorage;

    }

    setResultsData(results){

        this.ST.results = results;

    }

    getResultsData(){

        return this.ST.results;

    }

    setPaginationData(pagination){

        this.ST.pagination = pagination;

    }

    getPaginationData(){

        return this.ST.pagination;

    }

    clearSessionStore(){

        this.ST.clear();
    }
}

export default SessionStoreManager;