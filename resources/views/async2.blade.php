@extends('master.master')
@section('content')

<script>

//PRIMJER PROMISESA
const promise = new Promise( (resolve, reject) => {
    setTimeout(() => {
        let e = new Error('Error sam!');
        if(e){
            resolve({user:'marin'});
        }else{
            console.log(e);
        }
    }, 2000);
});

promise.then( (user) => console.log(user))
.catch( (err) => console.log(err));




//MALI PROJEKT PRIMJER ZA PROMISE! 

console.log('start');

function loginUser(email, password){
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            console.log('Now we have the data ' + email);
            reslove( { userEmail : email });
        }, 3000);
    });
}


function getUserVideos(email) {
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            reslove(["video1" , "video2" , "video3"]);     
        }, 2000);
    });
}


function videoDetails(video) {
    return new Promise( (reslove, reject) => {
        setTimeout(() => {
            reslove('Title of video');
        }, 2000);
    });
}


loginUser('marin', 'geralt1992')
.then( (user) => getUserVideos(user.email)) //imam user, userov email i na konto njega zovem uservideos, kojem treba userov email
.then( (videos => videoDetails( videos[0]) ))
.then( (videoDetail => console.log(videoDetail)))
.catch( (err) => console.log(err));





//PARALELNO VIŠE PROMISA DA RADI U ISTO VRIJEME

const yt = new Promise( reslove => {
    setTimeout( () => {
        console.log("getting stuff YT");
        reslove( {videos : [1, 2, 3, 4, 5,]});
    }, 2000);
});

const fb = new Promise( reslove => {
    setTimeout( () => {
        console.log("getting stuff FB");
        reslove( {user : 'Marin'});
    }, 3000);
});


//oboje kreću u isto vrijeme čekaš 2 sekunde, a ne 4 kao što bi čekao s običnim promisom!!!
//tipa ako jednom promisu treba 3 sek, a drugom 2, res ce se vratit tek kad oboje budu fulfiled znači za 3 sek
Promise.all([yt, fb])
.then( (res) => console.log(res));





//WHIT SUGAR - ASYNC && AWAIT
//err handling s try() | catch()

async function displayUser() {
    try{
        const loggedUser = await loginUser('ed' , 1234);
        const videos = await getUserVideos(loggedUser.userEmail);
        const detail = await videoDetails(videos[0]);
        console.log(videos, detail);
    }
    catch(err){
        console.log(err);
    }
}

displayUser();

console.log('finish');
</script>
@endsection