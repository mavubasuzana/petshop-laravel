document.addEventListener('DOMContentLoaded', () => {

    const formsDelete =
        document.querySelectorAll('.form-delete');

    formsDelete.forEach(form => {

        form.addEventListener('submit', e => {

            const confirmar =
                confirm('Deseja realmente excluir?');

            if(!confirmar){

                e.preventDefault();

            }

        });

    });

});