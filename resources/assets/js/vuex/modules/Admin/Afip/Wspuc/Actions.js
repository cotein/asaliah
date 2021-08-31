export const wsPucGetPerson = async (context, payload) => {

    try {
        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

        let person = await axios.post('/api/afip/get_persona', 
        {
            cuit : payload.cuit
        });

        return person;
        
    } catch (error) {
        throw error
    }
}