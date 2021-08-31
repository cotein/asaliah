
export default {

    merhods : {

        zeroLeft (str, max) {
            str = str.toString();
            return str.length < max ? this.zeroLeft("0" + str, max) : str;
        },
        
    }
}