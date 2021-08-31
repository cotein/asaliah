export default {

    methods : {

        view_422_status_error(array_errors, txt)
        {
            for (const e in array_errors){
                this.error_message(array_errors[e][0], txt);
            }
        }
    }
}