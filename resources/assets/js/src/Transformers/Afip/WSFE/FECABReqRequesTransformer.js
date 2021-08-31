const CantReg = 1;

class FECABReqRequestTransformer {

    static transformerData(PtoVta, CbteTipo){

        let dataTransformed = {

            CantReg : CantReg,
            PtoVta : PtoVta,
            CbteTipo : CbteTipo

        }

        return dataTransformed;
    }
}

export default FECABReqRequestTransformer;