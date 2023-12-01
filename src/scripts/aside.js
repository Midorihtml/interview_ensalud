'use strict'

const render_comments = async (post_id) => {

    const comment = new Comment();
    await comment.fetch(post_id);
    const comments = await comment.get();

    const [modal] = document.getElementsByClassName('modal-body');
    modal.innerHTML = '';

    const fragment = document.createDocumentFragment();

    comments.forEach(({ email, body }) => {
        let template = document.createElement('template');

        template.innerHTML = `
        <li class="card w-100 p-4">
            <p class="-0"><strong>${email}</strong></p>
            <hr>
            <span>${body}</span>
        </li>
        `;
        fragment.appendChild(template.content);
    })
    modal.appendChild(fragment);
};


const render_posts = (elementWrapperId, posts) => {
    const wrapper = document.getElementById(elementWrapperId);
    const fragment = document.createDocumentFragment();

    wrapper.innerHTML = '';

    posts.forEach(({ id, title, body }) => {

        let template = document.createElement('template');
        template.innerHTML = `
        <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">${title}</h5>
                <p class="card-text">${body}</p>
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <button type="button" id="${id}" class="comment w-100 btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#modal">comentarios</a>
                </div>
            </div>
        </div>
    `
        fragment.appendChild(template.content);
    })
    wrapper.appendChild(fragment);

    let cards_post = document.getElementsByClassName('comment');
    Array.from(cards_post).forEach((card) => {
        card.addEventListener('click', () => {
            render_comments(card.id);
        })
    })
}

const [ul_users] = document.getElementsByClassName('users');

window.addEventListener('load', async () => {

    const user = new User();
    const post = new Post();

    const users = await user.get();

    const fragment = document.createDocumentFragment();

    users.forEach(user => {
        let li = document.createElement('li');
        let a = document.createElement('a');
        let span = document.createElement('span');

        a.href = `/user/${user.id}`;
        a.innerHTML = `
            <img class="pointer" src="./src/assets/icons/user-pen-solid.svg" alt="icon edit user"/>
        `;
        a.classList.add('pointer')

        span.textContent = user.name;
        span.classList.add('pointer');

        span.addEventListener('click', async () => {
            await post.fetch(user.id);
            render_posts('posts_cards', await post.get());
        });
        li.classList.add('user', 'list-group-item', 'd-flex', 'justify-content-between');
        li.appendChild(span);
        li.appendChild(a);

        fragment.appendChild(li);
    });

    ul_users.appendChild(fragment);
})
