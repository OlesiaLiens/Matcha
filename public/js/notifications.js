//——————————————————————————————————//
//          xeee      .--~*teu.     //
//         d888R     dF     988Nx   //
//        d8888R    d888b   `8888>  //
//       @ 8888R    ?8888>  98888F  //
//     .P  8888R     "**"  x88888~  //
//    :F   8888R          d8888*`   //
//   x"    8888R        z8**"`   :  //
//  d8eeeee88888eer   :?.....  ..F  //
//         8888R     <""888888888~  //
//         8888R     8:  "888888*   //
//      "*%%%%%%**~  ""    "**"`    //
//——————————————————————————————————//


let seeCounter;
let likeCounter;
let matchCounter;
let msgsCounter;
let interactor;
var hulla = new hullabaloo();

const checkUpdates = () => {
    $.ajax({
        url: '/notification/getCounters',
        type: 'get',
        success: countersJSON => {
            // console.log(countersJSON);
            let counters = JSON.parse(countersJSON);
            let newSee = counters.see;
            let newLike = counters.like;
            let newMatch = counters.match;
            let newMsgs = counters.msgs;

            if (newSee > seeCounter) {
                notify('see');
                seeCounter = newSee;
            }
            if (newLike > likeCounter) {
                notify('like');
                likeCounter = newLike;
            }
            if (newLike < likeCounter) {
                notify('unlike');
                likeCounter = newLike;
            }
            if (newMatch > matchCounter) {
                notify('match');
                matchCounter = newMatch;
            }
            if (newMatch < matchCounter) {
                notify('unmatch');
                matchCounter = newMatch;
            }
            if (newMsgs > msgsCounter) {
                notify('msgs');
                msgsCounter = newMsgs;
            }
        }
    });
};

const getInteractor = interaction => {
    // console.log(interaction);
    if (interaction == 'see') {
        $.ajax({
            url: '/notification/getInteractor/see',
            type: 'get',
            success: response => {
                let name = JSON.parse(response);
                hulla.send(`${name.first_name} ${name.last_name} has a great interest int your profile...`, "success");
            }
        });
    }

    if (interaction == 'like') {
        $.ajax({
            url: '/notification/getInteractor/like',
            type: 'get',
            success: response => {
                let name = JSON.parse(response);
                hulla.send(`Congrats! ${name.first_name} ${name.last_name} has liked you`, "success");
            }
        });
    }

    if (interaction == 'match') {
        $.ajax({
            url: '/notification/getInteractor/match',
            type: 'get',
            success: response => {
                hulla.send(`Yay! You matched with someone, check the chat now to see who that was!`, "success");
            }
        });
    }
    // console.log(interaction);
}

function notify(typeOfEvent) {


    if (typeOfEvent == 'see') {
        getInteractor('see')
    }
    if (typeOfEvent == 'like') {
        getInteractor('like')
    }
    if (typeOfEvent == 'unlike') {
        hulla.send("Too bad! Someone who liked you previously doesn\'t like you anymore :(", "success");
    }
    if (typeOfEvent == 'match') {
        getInteractor('match')
    }
    if (typeOfEvent == 'unmatch') {
        hulla.send("Too bad, someone you previously matched with isn\'t that fond of you now :(", "success");
    }
    if (typeOfEvent == 'msgs') {
        hulla.send("Hey! Check the chat, someone wrote you!", "success");
    }
}

$(document).ready(() => {
    $.ajax({
        url: '/notification/getCounters',
        type: 'get',
        success: countersJSON => {
            console.log(countersJSON);
            let counters = JSON.parse(countersJSON);
            console.log(counters);
            seeCounter = counters.see;
            likeCounter = counters.like;
            matchCounter = counters.match;
            msgsCounter = counters.msgs;
            setInterval(checkUpdates, 5000);
        }
    });
});


