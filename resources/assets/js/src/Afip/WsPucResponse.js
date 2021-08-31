
class WsPucResponse {

    constructor(response) {
        this.person = response;
    }

    isCuil()
    {
        
    }

    hasPersonaReturn()
    {
        if (this.person.hasOwnProperty('personaReturn')) {
            return true
        }
        return false;
    }

    hasDatosGenerales()
    {
        if (this.person.personaReturn.hasOwnProperty('datosGenerales')) {
            return true
        }
        return false;
    }

    hasDatosMonotributo()
    {
        if (this.person.personaReturn.hasOwnProperty('datosMonotributo')) {
            return true
        }
        return false;
    }

    hasDomicilioFiscal()
    {
        if (this.person.personaReturn.datosGenerales.hasOwnProperty('domicilioFiscal')) {
            return true
        }
        return false;
    }

    hasErrorConstancia()
    {
        if (this.hasPersonaReturn()) {
            if (this.person.personaReturn.hasOwnProperty('errorConstancia')) {
                return true;
            }
            return false;
        }
        return false;
    }

    hasNombre()
    {
        if (this.person.personaReturn.datosGenerales.hasOwnProperty('nombre')) {
            return true
        }
        return false;
    }

    hasApellido()
    {
        if (this.person.personaReturn.datosGenerales.hasOwnProperty('apellido')) {
            return true
        }
        return false;
    }

    hasRazonSocial()
    {
        if (this.person.personaReturn.datosGenerales.hasOwnProperty('razonSocial')) {
            return true
        }
        return false;
    }

    getErrorConstancia()
    {
        if (this.hasErrorConstancia()) {
            return this.person.personaReturn.errorConstancia.error;
        }
    }

    getDomicilio()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if(this.hasDomicilioFiscal())
                {
                    return this.person.personaReturn.datosGenerales.domicilioFiscal;
                }
            }
        }
    }

    getNameOrRazonSocial()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if (this.hasRazonSocial()) {
                    return this.person.personaReturn.datosGenerales.razonSocial;
                }

                let name = null;
                
                if (this.hasNombre()) {
                    
                    name = this.person.personaReturn.datosGenerales.nombre;
                }

                if (this.hasApellido()) {
                    
                    name = name + ' ' + this.person.personaReturn.datosGenerales.apellido;
                }

                return name;

            }

            return false;
        }

        return false;
    }

    getEstadoClave()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                return this.person.personaReturn.datosGenerales.estadoClave;
            }

            return false;
        }

        return false;
    }

    getTipoPersona()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                return this.person.personaReturn.datosGenerales.tipoPersona;
            }

            return false;
        }

        return false;
    }

    getTipoClave()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                return this.person.personaReturn.datosGenerales.tipoClave;
            }

            return false;
        }

        return false;
    }

    getNumber()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                return this.person.personaReturn.datosGenerales.idPersona;
            }

            return false;
        }

        return false;
    }

    hasRegimenGeneral()
    {
        if(this.hasPersonaReturn())
        {
            if (this.person.personaReturn.hasOwnProperty('datosRegimenGeneral')) {
                return true
            }
            return false;
        }

        return false;
    }

    hasRegimen()
    {
        if (this.hasRegimenGeneral()) {
            if (this.person.personaReturn.datosRegimenGeneral.hasOwnProperty('regimen')) {
                return true
            }
            return false;
        }
    }

    getRegimenes()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasRegimenGeneral())
            {
                if(this.hasRegimen())
                {
                    return this.person.personaReturn.datosRegimenGeneral.regimen;
                }
            }
        }
    }

    getCodPostal()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if (this.hasDomicilioFiscal()) {
                    return this.person.personaReturn.datosGenerales.domicilioFiscal.codPostal;
                }
                return false;
            }

            return false;
        }

        return false;
    }

    getProvincia()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if (this.hasDomicilioFiscal()) {
                    return this.person.personaReturn.datosGenerales.domicilioFiscal.descripcionProvincia;
                }
                return false;
            }

            return false;
        }

        return false;
    }

    getLocalidad()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if (this.hasDomicilioFiscal()) {
                    return this.person.personaReturn.datosGenerales.domicilioFiscal.localidad;
                }
                return false;
            }

            return false;
        }

        return false;
    }

    getDireccion()
    {
        if(this.hasPersonaReturn())
        {
            if(this.hasDatosGenerales())
            {
                if (this.hasDomicilioFiscal()) {
                    return this.person.personaReturn.datosGenerales.domicilioFiscal.direccion;
                }
                return false;
            }

            return false;
        }

        return false;
    }



}

export default WsPucResponse;