
class AttributeNameTransformer
{
    transformer_attribute(data) {

        switch (data) {
            case 'BRAND':
                return 'MARCA';
            
            case 'MODEL':
                return 'MODELO';
            
            case 'FOOTWEAR_MATERIAL':
                return 'MATERIAL DEL CALZADO';

            case 'FOOTWEAR_MATERIALS':
                return 'MATERIAL DEL CALZADO';
            
            case 'FOOTWEAR_TYPE':
                return 'TIPO DE CALZADO';
            
            case 'GENDER':
                return 'GÉNERO';
            
            case 'IS_FLAMMABLE':
                return 'ES INFLAMABLE';
            
            case 'IS_KIT':
                return 'ES UN KIT';
            
            case 'ITEM_CONDITION':
                return 'CONDICIÓN DEL PRODUCTO';
            
            case 'OUTSOLE_MATERIAL':
                return 'MATERIAL DE LA SUELA';

            case 'FOOTWEAR_STYLE':
                return 'ESTILO DE CALZADO';
            
            case 'RELEASE_SEASON':
                return 'TEMPORADA';
            
            case 'RELEASE_YEAR':
                return 'AÑO';
            
            case 'RECOMMENDED_SPORTS':
                return 'ACTIVIDAD RECOMENDADA';
            
            case 'STYLE':
                return 'ESTILO';
            
            case 'LINE':
                return 'LÍNEA';

            case 'SHAFT_TYPE':
                return 'CAÑA';
            
            case 'ADJUSTMENT_TYPE':
                return 'TIPO DE AJUSTE';
            
            case 'AGE_GROUP':
                return 'EDAD';
            
            case 'VERSION':
                return 'VERSIÓN';
            
            case 'ALPHANUMERIC_MODEL':
                return 'MODELO ALFANUMÉRICO';
            
            case 'FOOTWEAR_TECHNOLOGIES':
                return 'TECNOLOGÍA DEL CALZADO';
            
            case 'SUITABLE_SURFACES':
                return 'SUPERFICIES APTAS';
            
            case 'WITH_PLATFORM':
                return 'CON PLATAFORMA';

            case 'COLOR':
                return 'COLOR';
            
            case 'SIZE':
                return 'TALLE';
            
            case 'FABRIC_DESIGN':
                return 'DISEÑO';
            
            case 'PATTERN_NAME':
                return 'Nombre del diseño';
        }
    }
}

export default AttributeNameTransformer;