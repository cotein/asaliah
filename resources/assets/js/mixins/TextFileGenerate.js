export default {

    methods : {

        text_proccess(array)
        {
            let navigator = window.navigator;

            let eol = null;

            if (navigator.platform == 'Win32' || navigator.platform == 'Win64') {
                eol = '\r\n';
            }
            if (navigator.platform == 'Unix' || navigator.platform == 'Linux') {
                eol = '\n';
            }

            let text = '';

            array.forEach(row => {
                text = text + row + eol;
            });

            return text;
        },

        //It replaces the old Mac (\r) and the Windows (\r\n) newlines with the Unix equivalent (\n).
        txt_generate(text, nameFile, type=null)
        {

            let  textFile = null;
            
            switch (type) {
                case 'txt':
                    type_file = 'text/plain';
                    break;

                case 'xls' || 'xlsx':
                    type_file = 'application/vnd.ms-excel';
                    break;

                case 'pdf':
                    type_file = 'application/pdf';
                    break;
            
                default:
                    break;
            }

            let  data = new Blob([text], {type: type_file});

            // If we are replacing a previously generated file we need to
            // manually revoke the object URL to avoid memory leaks.
            if (textFile !== null) {
              window.URL.revokeObjectURL(textFile);
            }
        
            textFile = window.URL.createObjectURL(data);

            const link = document.createElement('a');
            link.href = textFile;
            link.download = nameFile + '.' + type;
            link.click();

        }
    }
}