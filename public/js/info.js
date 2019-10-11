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


function infoFunction() {
    console.log('HHHHHH!');
    let tags = [];
    let interestSelection = document.getElementById('interest');
    let selectedTags = document.getElementById('selectedTags');
    let okBtn = document.getElementById('okBtn');

    interestSelection.onchange = () => {
        let selectedTag = interestSelection.value;
        tags.push(selectedTag);
        console.log(tags);
        let newTag = document.createElement('span');
        newTag.setAttribute('class', 'badge badge-primary');
        newTag.innerHTML = selectedTag;
        selectedTags.appendChild(newTag);

        newTag.onclick = event => {
            let target = event.target;
            target.parentNode.removeChild(target);
            let idx = tags.indexOf(target.innerHTML);
            tags.splice(idx, 1);
            console.log(tags);
        }
    };

    okBtn.onclick = () => {

        $.ajax({
            url: '/info/tags/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(tags)}
        });

    };
}

window.onload = function () {
    infoFunction();
    console.log('Im here');
}