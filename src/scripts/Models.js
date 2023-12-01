'use strict'

const config = {
    API_URL: 'https://jsonplaceholder.typicode.com',
    HOST: 'http://ensalud.bemy.com.ar'
};

class Api {
    get = async (url) => {
        try {
            const response = await fetch(config.API_URL + url);
            const json = response.json();
            return json;
        } catch (error) {
            console.error(error.message || error);
        }
    }

    post = async (url, formdata) => {
        try {
            const options = {
                method: 'POST',
                body: formdata,
            };

            const response = await fetch(url, options);
            const json = response.json();
            return json;
        } catch (error) {
            console.error(error.message || error);
        }
    }
};

class User {
    users = [];

    fetch = (id) => {
        const users = new Api();
        if (!id) return this.setUsers(users.get('/users'));
        return this.setUsers(users.get(`/users/${id}`))
    }

    get = (id) => {
        this.fetch(id);
        return this.users;
    }

    post = (url, formdata) => {
        const user = new Api();
        return user.post(url, formdata);
    }

    setUsers = (users) => {
        this.users = users;
    }
}

class Post {
    posts = [];

    fetch = (id) => {
        const posts = new Api();
        if (!id) return this.setPost(posts.get('/posts'));
        return this.setPost(posts.get(`/posts?userId=${id}`));
    }

    get = () => {
        return this.posts;
    }

    setPost = (posts) => {
        this.posts = posts;
    }
}

class Comment {
    comments = [];

    fetch = (post_id) => {
        const comments = new Api();
        return this.setComment(comments.get(`/comments?postId=${post_id}`));
    }

    get = () => {
        return this.comments;
    }

    setComment = (comments) => {
        this.comments = comments;
    }
}