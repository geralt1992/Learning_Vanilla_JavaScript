
import './scss/app.scss'
import header from './components/header.js';
import user from './components/user.js';

const app = async () => {
    document.getElementById('header').innerHTML = header();
    document.getElementById('user').innerHTML = await user();
}

//init app
app();
