'use strict'

const get_param_id = () => {
    return window.location.pathname.split('/')[2];
};

const user_data_adapter = (user_data) => {
    return {
        ...user_data,
        address_street: user_data.address.street,
        address_suite: user_data.address.suite,
        address_city: user_data.address.city,
        address_zipcode: user_data.address.zipcode,
        address_geo_lat: user_data.address.geo.lat,
        address_geo_lng: user_data.address.geo.lng,
        company_name: user_data.company.name,
        company_catchPhrase: user_data.company.catchPhrase,
        company_bs: user_data.company.bs,
    }
};

const autofill_form = (inputsCollection, values) => {
    for (let index = 0; index < inputsCollection.length; index++) {
        const input = inputsCollection[index];
        if (input.type == 'file') continue;
        input.value = values[input.name];
    }
};

const render_toast = (type, msg) => {
    const [toast] = document.getElementsByClassName('toast');
    const [toast_body] = document.getElementsByClassName('toast-body');

    if (type == 'error') {
        toast.classList.add('show', 'error');
        toast.classList.remove('hide');
        toast_body.textContent = msg;
        setTimeout(() => {
            toast.classList.add('hide');
            toast.classList.remove('show', 'error');
        }, 2000);
        return;
    }
    toast.classList.add('show', 'success');
    toast_body.textContent = msg;
    setTimeout(() => {
        toast.classList.add('hide');
        toast.classList.remove('show', 'success');
    }, 2000);
    return;
}

const onSubmit = async (evento) => {
    evento.preventDefault();
    const [avatar] = document.getElementsByClassName('avatar');
    const user = new User();
    const user_id = get_param_id();
    const data = new FormData(evento.target);
    const response = await user.post(`/user/${user_id}`, data);

    if (response.status !== 200) {
        return render_toast('error', '¡Error!');
    }
    avatar.src = config.HOST + '/filestore/img/' + response.avatar_url;
    render_toast('success', '¡success!')
}

window.addEventListener('load', async () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', onSubmit);

    const inputs = document.querySelectorAll('input');

    const user = new User();
    const user_id = get_param_id();

    const user_data = await user.get(user_id);
    const user_adapted = user_data_adapter(user_data);

    autofill_form(inputs, user_adapted);
});