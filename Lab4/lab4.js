function p1validate(name, phone, address){
    const nameregex = /^[A-Za-z\ ]+$/;
    const phoneregex = /^\([0-9]{3}\)\ [0-9]{3}\-[0-9]{4}/;
    if(!name.value.match(nameregex) && !phone.value.match(phoneregex)){
        alert("Name can only contain letters and phone number must be in (437) 567-7890 format");
        name.focus();
        phone.focus();
        return false;
    }
    else if(!name.value.match(nameregex)){
        alert("Names can only contain letters");
        name.focus();
        return false;
    }
    else if(!phone.value.match(phoneregex)){
        alert("Phone number must have (437) 567-7890 format");
        phone.focus();
        return false;
    }
    else{
        let newp = phone.value.replace("(", "").replace(")", "").replace(" ", "-");
        document.getElementById("p1validated").innerHTML = `
            <h2>User Information: </h2>
            <p>Name: ${name.value}</p>
            <p>Address: ${address.value}</p>
            <p>Phone Number: ${newp}</p>
        `;

        document.getElementById("p1form").reset();
    }
}

function p2charletterc(){
        var text = document.getElementById('p2text').value;
        var charcount = 0;
        var lettercount = 0;
        const letterregex = /[A-Za-z]/;
        for (var i = 0; i<text.length;i++){
            charcount+=1;
            if(text[i].match(letterregex)){
                lettercount+=1;
            }
        }

        document.getElementById('charct').innerHTML = charcount;
        document.getElementById('letterct').innerHTML = lettercount;
}

function p3bookmarks(){
    const bookmarks = ["https://www.youtube.com/", "http://www.kindahardfindingahttpwebsitenowadays.com/"];
    const secureregex = /^https:.*/;
    const unsecureregex = /^http:.*/;
    var contentbookmark = "";
    for(let i=0;i<bookmarks.length;i++){
        if(bookmarks[i].match(secureregex)){
            contentbookmark+= `
            <p>&#9989&#128274  <a href="https://www.youtube.com/">${bookmarks[i]}</a></p>
            `;
        }
        else if(bookmarks[i].match(unsecureregex)){
            contentbookmark+=`
            <p>&#10060&#128275  <a href="http://www.kindahardfindingahttpwebsitenowadays.com/">${bookmarks[i]}</a></p>
            `;
        }
    }
    document.getElementById("p3list").innerHTML = contentbookmark;

}