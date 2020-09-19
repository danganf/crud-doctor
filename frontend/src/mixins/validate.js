export const inputCheckIsValid =  {
    methods: {
        mix_inputCheckIsValid (val, event) {
            if (val.$invalid) {
                event.target.nextElementSibling.classList.add('form__input-shake')
                event.target.nextElementSibling.style.display = 'block'
                event.target.classList.add('form__input-shake');
                setTimeout(() => {
                    event.target.classList.remove('form__input-shake');
                }, 800)
            } else {
                event.target.nextElementSibling.classList.remove('form__input-shake')
                event.target.nextElementSibling.style.display = 'none'
            }
        }
    }
};
