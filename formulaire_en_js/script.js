let validation;

function checkErreur(element, id)
{

    if(element.value == '')
    {
        document.getElementById(id).classList.remove("cache");
        validation = false;
    }
    else
    {
        document.getElementById(id).classList.add("cache");
    }
}
function cocher()
{
    if(document.getElementById("cdn").checked == false)
    {
        document.getElementById("v5").classList.remove("cache");
        validation = false;
    }
    else
    {
        document.getElementById("v5").classList.add("cache");
    }
}
document.querySelector("form").addEventListener("submit", (ev) =>
{
    validation = true;


    checkErreur(nom, "v1");
    checkErreur(prenom, "v2");
    checkErreur(phone, "v3");
    checkErreur(email, "v4");
    checkErreur(mdp, "v6");
    checkErreur(comment, "verif");

    cocher()

    if (validation == false)
        ev.preventDefault();
/*
    document.getElementById("v1").classList.remove("cache");
    document.getElementById("v2").classList.remove("cache");
    document.getElementById("v3").classList.remove("cache");
    document.getElementById("v4").classList.remove("cache");
    document.getElementById("v5").classList.remove("cache");
*/
    console.log("bad")
});