export default {
    
    async mounted(){
        window.addEventListener('keyup', (e) => {
            if (e.keyCode == 120) { //F9
                $('#article_modal').modal('show');
            }
        });
    }
}